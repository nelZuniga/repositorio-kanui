<?php
class apiModel extends Model{

public function __construct()
{
    parent::__construct();
}

public function login($data){
 //var_dump($data);
    $conn = $this->db->connect();
        $query = $conn->prepare("select id_usr from sys_log where sys_usr = ? and sys_pwd = ?");
        $dtype = "ss";
        $query->bind_param($dtype,$data['usr'], $data['pss']);
        $query->execute();

        $query->bind_result($rs);
        $query->fetch();
        if($rs !== 0 && !is_null($rs)){
            $data = ["Ingreso"=>true, "id_usr" => $rs];
        }else{
            $data = ["Ingreso"=>false, "id_usr" => $rs];
        }
        header('Content-Type: application/json');
        echo json_encode($data);
        
}

public function regCorreo($data){
    //var_dump($data);
    $conn = $this->db->connect();
    $query = $conn->prepare("
    UPDATE usuario SET estado = 1 where correo = ?");
                $ss = 's';
                $query->bind_param($ss ,$data['correo']);
    $retorno = false;
    
    if($query->execute()){
            $retorno = true;
    };
    return $retorno;
}

public function updhuella($data){
    $conn = $this->db->connect();
    $query = $conn->prepare("
    UPDATE usuario SET huella = ? where id_usr = ?");
                $ss = 'ss';
                $query->bind_param($ss ,$data['huella'],$data['id_usr'] );
    $retorno = false;
    
    if($query->execute()){
            $retorno = true;
    };
    echo $retorno;
    return $retorno;
    
    
}

public function getdata($data){
        
    $conn = $this->db->connect();
        $query = $conn->prepare("SELECT u.nombres, u.apellido_paterno, u.apellido_materno, u.documento, u.correo, c.descripcion as comuna, r.descripcion as region
        from usuario u
        left outer join comuna c on c.id_com = u.comuna
        inner join region r on r.id_reg = c.id_reg_region
        where id_usr =  ?");
        $dtype = "i";
        $query->bind_param($dtype,$data['usr']);
        $query->execute();
        $rs = $query->get_result();
        $query->fetch();
        $rest = [];
        while($row = mysqli_fetch_array($rs)){
            $rest = ["nombres"=>$row['nombres'],
            "apellido_paterno"=> $row['apellido_paterno'],
            "apellido_materno"=>$row['apellido_materno'],
            "documento"=>$row['documento'], 
            "correo"=>$row['correo'],
            "comuna"=>$row['comuna'],
            "region"=>$row['region']];
        }
        header('Content-Type: application/json');
        echo json_encode($rest);
        
    }  


    public function getpet($data){
        $conn = $this->db->connect();
            $query = $conn->prepare("SELECT n_chip 
            FROM `mascota` WHERE n_chip = ?");
            $dtype = "i";
            $query->bind_param($dtype,$data['chip']);
            $query->execute();
            $query->bind_result($rs);
            $query->fetch();
            if($rs!==0 && !is_null($rs)){
                $rest =  $this->getdatadueño($data);

            }else{
                $rest = 0;
            }
            header('Content-Type: application/json');
            echo json_encode($rest);
    }  

    public function getdatadueño($data){
        $conn = $this->db->connect();
        $query = $conn->prepare("SELECT IFNULL(u.id_usr, 'false') as idusr, IFNULL(m.nombre, 'false') as nombre, IFNULL(u.nombres, 'false') as nombres, IFNULL(u.apellido_paterno, 'false') as apellido ,IFNULL(u.cel, 'false') as tel, IFNULL(u.huella, 'false') as huella, IFNULL(ss.sys_usr, 'false') as correo
        FROM mascota m 
        inner join usuario u on u.id_usr = m.id_propietario 
        inner join sys_log ss on ss.id_usr = u.id_usr
        where m.n_chip = ?");

        $dtype = "i";
        $query->bind_param($dtype,$data['chip']);
        $query->execute();
        $rs = $query->get_result();
        $query->fetch();
        $rest = [];
        while($row = mysqli_fetch_array($rs)){

            if (!$this->asegurador(2, $row['idusr'])){
                $row['nombre'] = "false" ;
                }else{
                    $row['nombre'] = $row['nombre'];
                }

            if (!$this->asegurador(3, $row['idusr'])){
                    $row['tel'] = "false" ;
                }else{
                    $row['tel'] = $row['tel'];
                }


            $rest = [
            "nombreMascota"=>$row['nombre'],
            "nombre"=> $row['nombres'],
            "apellido"=> $row['apellido'],
            "tel"=>$row['tel'],
            "huella"=>$row['huella'],
            "correo"=>$row['correo'],
            "id_usr"=>$row['idusr']];
        }
        return $rest;
    }

    public function getMascotas($data){
        $respuesta = array();
        $usuario = $data;
        $sql = "SELECT id_mascot,nombre,n_chip,id_propietario, sexo,tipo_mascota , r.descripcion
        from mascota m
        inner join raza r on r.id_raza = m.raza
        where id_propietario = '".$usuario."' and estado = 1";
        $conn = $this->db->connect();
        try{
            $resp = '';
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                $respuesta[] = $row;
                
            }
            header('Content-Type: application/json');
            echo json_encode($respuesta);
        }catch(PDOException $e){

        }
    }

    public function getMascotafull($data){
        $respuesta = array();
        $mascota = $data;
        $sql = "SELECT id_mascot,
        nombre,
        n_chip,
        id_propietario, 
        s.descripcion as sexo,
        tp.descripcion as tipo , 
        r.descripcion as raza,
        c.descripcion as color,
        p.descripcion as patron,
        TIMESTAMPDIFF( YEAR, m.fecha_nac, now() ) as anios , 
        TIMESTAMPDIFF( MONTH, m.fecha_nac, now() ) % 12 meses , 
        FLOOR( TIMESTAMPDIFF( DAY, m.fecha_nac, now() ) % 30.4375 ) as dias
        from mascota m
        inner join raza r on r.id_raza = m.raza
        inner join sexo s on s.id_sex = m.sexo
        inner join colores c on c.id_color = m.color
        inner join patrones p on p.id_patron = m.patron
        inner join tipo_mascota tp on tp.id_tmasc = m.tipo_mascota
        where m.id_mascot = '".$mascota."'
        and estado = 1";
        $conn = $this->db->connect();
        try{
            $resp = '';
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                $respuesta['data']['mascotas'][] = $row;
                
            }
            header('Content-Type: application/json');
            echo json_encode($respuesta);
        }catch(PDOException $e){

        }
    }

    public function updmascota($data){
        $conn = $this->db->connect();
        $query = $conn->prepare("
        UPDATE mascota SET nombre = ?, sexo = ?, observaciones = ? WHERE id_mascot = ?");
                    $ss = 'sisi';
                    $query->bind_param($ss ,$data['nombre'], $data['sexo'],$data['obs'] , $data['id_masc']);
        $retorno = false;
        
        if($query->execute()){
                $retorno = true;
        };
        return $retorno;
    }

    public function getcarnet($data){

    }

    public function updusuario($data){
        $conn = $this->db->connect();
        $query = $conn->prepare("
        UPDATE usuario SET nombres = ?, apellido_paterno = ?, apellido_materno = ?, documento = ?, 
        tipo_documento = ? WHERE id_usr = ?");
                    $ss = 'ssssii';
                    $query->bind_param($ss ,$data['nombres'], $data['apellidop'],$data['apellidom'] , $data['doc'],$data['tdoc'],$data['id_usr']);
        $retorno = false;
        if($query->execute()){
                $retorno = true;
        };
        return $retorno;
    }

    public function setScan($data){
        $comp= ["id_usr"=>$data['id_usr'],"nchip"=>$data['nchip']];
        $resp = $this->comparator($comp); 
        $datamascota = ['nchip'=>$data['nchip']];
        $id_mascota = $this->getmascotaid($datamascota);
        $data = ["id_usr"=>$data['id_usr'],"lat"=>$data['lat'],"long"=>$data['long'],"nchip"=>$data['nchip'],"id_mascot"=>$id_mascota];
        if($id_mascota !== 0){
            if($resp){
                //es el dueño ver como redirigir a carnet
                $response = ["id_usr"=>$data['id_usr']];
                header('Content-Type: application/json');
                echo json_encode($response);
            }else{
                //no es el dueño guardar localizacion y revisar datos a mostrar
                $respuesta = $this->guardarScan($data);
                if($respuesta){
                    //obtener datos de contacto
                    $datos = ["chip"=>$data['nchip']];
                    $response = $this->getdatadueño($datos);
                    header('Content-Type: application/json');
                    echo json_encode($response);
                    
                }
            }

        }else{
            $response = ['existencia'=>'no'];
            header('Content-Type: application/json');
                    echo json_encode($response);
        }
        

    }

    public function comparator($data){
        //para verificar el dueño de mascota y el "escaneante"
        $sql = "SELECT id_propietario FROM `mascota` WHERE n_chip  = '".$data['nchip']."'";
        $conn = $this->db->connect();
        $respuesta = false;
        try{
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                if($row[0] === $data['id_usr']){
                    $respuesta = true;
                    return $respuesta;
                }
            }
            return $respuesta;
        }catch(PDOException $e){

        }
    }

    public function asegurador($id, $usuario){
        //para verificar el dueño de mascota y el "escaneante"
        $sql = "SELECT val FROM seg_data where id_usr =".$usuario." and id_attr = ".$id;
        $conn = $this->db->connect();
        $respuesta = false;
        try{
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                if($row[0] == '1'){
                    $respuesta = true;
                    return $respuesta;
                }else{
                    $respuesta = false;
                    return $respuesta;
                }
            }
            return $respuesta;
        }catch(PDOException $e){

        }
    }

    public function guardarScan($data){
        $conn = $this->db->connect();
        $query = $conn->prepare("
        INSERT INTO scans (id_usr,id_mascot,n_chip,lat,longitud)  
        VALUES ( ? , ? , ? , ? ,? )");
        if($query == false){
            return ["ok"=>'false'];
        }
                    $ss = 'iisss';
                    $query->bind_param($ss,$data['id_usr'],$data['id_mascot'],$data['nchip'],$data['lat'],$data['long']);
        $retorno = false;
        if($query->execute()){
                $retorno = true;
        };
        return $retorno;
    }

    public function getmascotaid($data){
        $sql = "SELECT id_mascot FROM `mascota` WHERE n_chip  = '".$data['nchip']."'";
        $conn = $this->db->connect();
        $respuesta = 0;
        try{
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                    $respuesta = $row[0];
                    return $respuesta;
            }
            return $respuesta;
        }catch(PDOException $e){

        }
    }

    public function getScans($data){
        $respuesta = array();
        $usuario = $data['id_usr'];
        $sql = "select DATE_FORMAT(s.fecha,'%d/%m/%Y') as fecha, DATE_FORMAT(s.fecha,'%H:%i:%s') as hora,s.id_scan, s.id_usr, s.id_mascot, s.n_chip, s.lat, s.longitud, m.id_propietario, m.nombre
        from scans s
        inner join mascota m on m.id_mascot = s.id_mascot
        where m.id_propietario ='".$usuario."'";
        $conn = $this->db->connect();
        try{
            $resp = '';
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                $respuesta[] = $row;
            }
            header('Content-Type: application/json');
            echo json_encode($respuesta);
        }catch(PDOException $e){

        }
    }

    public function getScanmascota($data){
        $respuesta = array();
        $mascota = $data['id_mascot'];
        $sql = "select id_scan, id_usr, id_mascot, n_chip, lat, longitud from scans where id_mascot = '".$mascota."'";
        $conn = $this->db->connect();
        try{
            $resp = '';
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                $respuesta['data']['mascotas'][] = $row;
            }
            header('Content-Type: application/json');
            echo json_encode($respuesta);
        }catch(PDOException $e){

        }
    }

    public function getAtenciones($data){
        $respuesta = array();
        $mascota = $data;
        $sql = "SELECT id_proc as id, DATE_FORMAT(fecha_Atencion,'%d/%m/%Y') as atencion, DATE_FORMAT(fecha_prox,'%d/%m/%Y') as proxima, nombres, apellido_paterno
        FROM `procedimiento` proc
        inner join vacunas vac on vac.id_vac = proc.id_vac
        inner join usuario u on u.id_usr = proc.id_vet
        WHERE 1 and id_mascot = ".$mascota;
        $conn = $this->db->connect();
        try{
            $resp = '';
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                $respuesta[] = $row;
                
            }
            header('Content-Type: application/json');
            echo json_encode($respuesta);
        }catch(PDOException $e){

        }
    }

    public function getAtencionDetalle($data){
        $respuesta = array();
        $atenc = $data;
        $sql = "SELECT DATE_FORMAT(fecha_Atencion,'%d/%m/%Y') as atencion, proc.peso, proc.observaciones, DATE_FORMAT(fecha_Atencion,'%d/%m/%Y') as proxima, vac.descripcion, u.nombres, u.apellido_paterno
        FROM `procedimiento` proc
        inner join vacunas vac on vac.id_vac = proc.id_vac
        inner join usuario u on u.id_usr = proc.id_vet
        WHERE 1 and id_proc = ".$atenc;
        $conn = $this->db->connect();
        try{
            $resp = '';
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                $respuesta[] = $row;
                
            }
            header('Content-Type: application/json');
            echo json_encode($respuesta);
        }catch(PDOException $e){

        }
    }

    
}


?>


