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
public function getdata($data){
        
    $conn = $this->db->connect();
        $query = $conn->prepare("SELECT nombres, apellido_paterno, apellido_materno, documento, correo
        from usuario
        where id_usr = ?");

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
            "correo"=>$row['correo']];
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
        $query = $conn->prepare("SELECT  m.nombre as nombre, u.nombres as nombres, u.apellido_paterno as apellido ,u.cel as tel
        FROM mascota m
        inner join usuario u on u.id_usr = m.id_propietario
        where m.n_chip = ?");

        $dtype = "i";
        $query->bind_param($dtype,$data['chip']);
        $query->execute();
        $rs = $query->get_result();
        $query->fetch();
        $rest = [];
        while($row = mysqli_fetch_array($rs)){
            $rest = ["nombreMascota"=>$row['nombre'],
            "nombre"=> $row['nombres'],
            "apellido"=> $row['apellido'],
            "tel"=>$row['tel']];
        }
        return $rest;
    }
    public function getMascotas($data){
        $respuesta = array();
        $usuario = $data;
        $sql = "select id_mascot,nombre,n_chip,id_propietario, sexo,tipo_mascota from mascota where id_propietario = '".$usuario."' and estado = 1";
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
        $sql = "select id_mascot,nombre,n_chip,id_propietario, sexo,imgMascota, observaciones from mascota where id_mascot = '".$mascota."' and estado = 1";
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
        $sql = "select s.id_scan, s.id_usr, s.id_mascot, s.n_chip, s.lat, s.longitud, m.id_propietario, m.nombre
        from scans s
        inner join mascota m on m.id_mascot = s.id_mascot
        where m.id_propietario = '".$usuario."'";
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


