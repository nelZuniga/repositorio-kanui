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
        $query = $conn->prepare("insert into usuario(nombres, apellido_paterno, apellido_materno,documento,comuna,estado,cel)
                    values(?,?,?,?,?,?,?)");
                    $ss = 'ssssiis';
                    $estado = 1;
        $query->bind_param($ss, $data['nombre'], $data['apellidop'],$data['apellidom'], $data['rut'], $data['comuna'], $estado, $data['telefono']);
        $retorno = false;
        if($query->execute()){
            $id_usr = $mysqli->insert_id;
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
        $query->bind_param($ss,$data['id_usr'], $data['correo'], $data['contraseña']);
        $retorno = false;
        if($query->execute()){
            if($this->seguridad($seg)){
                $retorno = true;
            };
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
                $resp = "<option value='".$row['id_reg']."'> ".$row['descripcion']."</option>";
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
                $resp = "<option value='".$row['id_com']."'> ".$row['descripcion']."</option>";
                echo $resp;
            }
            return $resp;
            

        }catch(PDOException $e){

        }
    }
}
?>