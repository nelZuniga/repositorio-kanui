<?php
include_once'models/region.php';
class RegistroUsuarioModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }


    public function insert($data){
        //insertar data
        $conn = $this->db->connect();
        $query = $conn->prepare("insert into usuario(nombres, apellido_paterno, apellido_materno,documento,comuna,estado,cel,tipo_usr,direccion,correo)
                    values(?,?,?,?,?,?,?,?,?,?)");
                    $ss = 'ssssiisiss';
                    $estado = 1;
        $query->bind_param($ss, $data['nombre'], $data['apellidop'],$data['apellidom'], $data['rut'], $data['comuna'], $estado, $data['telefono'], $data['rol'], $data['direccion'], $data['correo']);
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

}
?>