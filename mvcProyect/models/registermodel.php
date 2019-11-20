<?php
include_once'models/region.php';
class RegisterModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }
 

    public function insert($data){
        //insertar data
        $conn = $this->db->connect();
        $query = $conn->prepare("insert into usuario(nombres, apellido_paterno, apellido_materno,documento,comuna,estado,cel,tipo_usr,direccion,correo,chkTC)
                    values(?,?,?,?,?,?,?,?,?,?,?)");
                    $ss = 'ssssiisissi';
                    $estado = 0;
                    $rol = 2;
        $query->bind_param($ss, $data['nombre'], $data['apellidop'],$data['apellidom'], $data['rut'], $data['comuna'], $estado, $data['telefono'], $rol, $data['direccion'], $data['correo'], $data['chkTC']);
        $retorno = false;
        if($query->execute()){
            $id_usr = $conn->insert_id;
            $seg = ['usr'=>$data['correo'],'pss'=>$data['contraseña'],'id_usr'=>$id_usr];
            if($this->seguridad($seg)){
                $retorno = true;
            };
        };
        return $retorno;
    }

    public function seguridad($data){
        $conn = $this->db->connect();
        $query = $conn->prepare("insert into sys_log(id_usr,sys_usr,sys_pwd)
                    values(?,?,?)");
                    $ss = 'iss';
        $query->bind_param($ss,$data['id_usr'], $data['usr'], $data['pss']);
        $retorno = false;
        if($query->execute()){
                $retorno = true;
        };
        return $retorno;

    }

    public function getregion(){
        $sql = 'SELECT * from region order by orden';
        $conn = $this->db->connect();
        try{
            $resp = '';
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                $resp = "<option value='".$row['id_reg']."'> ".utf8_encode($row['descripcion'])."</option>";
                echo $resp;
            }
            return $resp;
            

        }catch(PDOException $e){

        }
    }

    public function getcomuna($idreg){
        $sql = 'SELECT * from comuna where id_reg_region = '.$idreg;
        //echo $sql;
        $conn = $this->db->connect();
        try{
            $resp = '';
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                $resp = "<option value='".$row['id_com']."'> ".utf8_encode($row['descripcion'])."</option>";
                echo $resp;
            }
            return $resp;
            

        }catch(PDOException $e){

        }
    }

    public function getrol(){
        $sql = 'SELECT * from tipo_usuario order by 2';
        //echo $sql;
        $conn = $this->db->connect();
        try{
            $resp = '';
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                $resp = "<option value='".$row['id_tusr']."'> ".utf8_encode($row['descripcion'])."</option>";
                echo $resp;
            }
            return $resp;
            

        }catch(PDOException $e){

        }
    }

    public function checkCorreo($mail){
        $sql = "SELECT count(*) as correo from sys_log where sys_usr = '".$mail."'";
        //echo $sql;
        $conn = $this->db->connect();
        try{
            $resp = 0;
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                $resp = $row['correo'];
                echo $resp;
            }
            return $resp;
            

        }catch(PDOException $e){

        }
    }


    public function getDataUser($id){
        $respuesta = array();
        $sql = "SELECT `id_usr`,
        `nombres`,
        `apellido_paterno`,
        `apellido_materno`,
        `documento`,
        `tipo_usr`,
        `direccion`,
        `comuna`,
        `estado`,
        `correo`,
        `cel` ,
        `id_reg_region`
        from usuario u
        inner join comuna com on com.id_com = u.comuna
        where id_usr = '".$id."'";
        //echo $sql;
        $conn = $this->db->connect();
        try{
            $resp = 0;
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                $respuesta[] = $row;
            }
            //header('Content-Type: application/json');
            echo json_encode($respuesta);
            return $resp;
            

        }catch(PDOException $e){

        }
    }

    public function updateUsr($data){
        $conn = $this->db->connect();
        $query = $conn->prepare("update usuario
        set nombres = ? ,
        apellido_paterno = ? ,
        apellido_materno = ? ,
        documento = ? ,
        comuna = ? ,
        cel = ? ,
        tipo_usr = ? ,
        direccion = ? ,
        correo = ?
        where id_usr = ?");
                    $ss = 'ssssisissi';
                    $estado = 1;
        $query->bind_param($ss, $data['nombres'], $data['apellidoP'],$data['apellidoM'], $data['rut'], $data['comuna'], $data['telefono'], $data['tipo_usr'], $data['direccion'], $data['correo'], $data['id_usr']);
        $retorno = false;
        if($query->execute()){
                $retorno = true;
        };
        return $retorno;
    }

}
?>