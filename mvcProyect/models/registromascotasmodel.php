<?php
include_once'models/raza.php';
class registromascotasModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }
    public function insert($data){
        $conn = $this->db->connect();
        $query = $conn->prepare("insert into mascota(n_chip, id_propietario, nombre, tipo_mascota, sexo, raza, patron, color, fecha_nac, observaciones, estado, imgMascota)
                    values(?,?,?,?,?,?,?,?,?,?,?,?)");
                    $ss = 'sssiiiiissis';
                    $estado= 1;
        $query->bind_param($ss, $data['n_chip'], $data['id_propietario'], $data['nombre'], $data['tipo_mascota'],  $data['sexo'], $data['raza'], $data['patron'], $data['color'], $data['fecha_nac'], $data['observaciones'], $estado, $data['img']);        
        $retorno = false;
        if($query->execute()){
                $retorno = true;
        };
        return $retorno;
    }
    public function getRaza($tipo){
        $sql = 'SELECT * from raza where tipoRaza = '.$tipo.' order by 2';
        $conn = $this->db->connect();
        try{
            $resp = '';
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                $resp = "<option value='".$row['id_raza']."'> ".utf8_encode($row['descripcion'])."</option>";
                echo $resp;
            }
            return $resp;
            

        }catch(PDOException $e){

        }
    }

    public function getSexo(){
        $sql = 'SELECT * from sexo';
        $conn = $this->db->connect();
        try{
            $resp = '';
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                $resp = "<option value='".$row['id_sex']."'> ".utf8_encode($row['descripcion'])."</option>";
                echo $resp;
            }
            return $resp;
            

        }catch(PDOException $e){

        }
    }

    public function getTipo(){
        $sql = 'SELECT * from tipo_mascota';
        $conn = $this->db->connect();
        try{
            $resp = '';
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                $resp = "<option value='".$row['id_tmasc']."'> ".utf8_encode($row['descripcion'])."</option>";
                echo $resp;
            }
            return $resp;
            

        }catch(PDOException $e){

        }
    }

    public function getuserDoc($usuario){
        $respuesta = array();
        $documento = $usuario['documento'];
        $sql = "select id_usr, nombres, apellido_paterno, apellido_materno, documento from usuario where documento like '%".$documento."%' and tipo_usr = 2";
        $conn = $this->db->connect();
        try{
            $resp = '';
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                /*$resp = "<tr><td>".$row['id_usr']."</td><td>".$row['nombres']."</td><td>".$row['apellido_paterno']."</td><td>".$row['apellido_materno']."</td></tr>";
                echo $resp;*/
                $respuesta['data']['users'][] = $row;
                echo json_encode($respuesta);

            }
            return json_encode($respuesta);
        }catch(PDOException $e){

        }
    }

    public function getuserNom($usuario){
        $respuesta = array();
        $nombre = $usuario['nombre'];
        $apellido = $usuario['apellido'];
        $sql = "select id_usr, nombres, apellido_paterno, apellido_materno, documento from usuario where nombres like '%".$nombre."%' or apellido_paterno like '%".$apellido."%'and tipo_usr = 2";
        $conn = $this->db->connect();
        try{
            $resp = '';
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                /*$resp = "<tr><td>".$row['id_usr']."</td><td>".$row['nombres']."</td><td>".$row['apellido_paterno']."</td><td>".$row['apellido_materno']."</td></tr>";
                echo $resp;*/
                $respuesta['data']['users'][] = $row;
            }
            echo json_encode($respuesta);
            return json_encode($respuesta);
        }catch(PDOException $e){

        }
    }

    public function getColor(){
        $sql = 'SELECT * from colores';
        $conn = $this->db->connect();
        try{
            $resp = '';
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                $resp = "<option value='".$row['id_color']."'> ".utf8_encode($row['descripcion'])."</option>";
                echo $resp;
            }
            return $resp;
            

        }catch(PDOException $e){

        }
    }    

    public function getPatron(){
        $sql = 'SELECT * from patrones';
        $conn = $this->db->connect();
        try{
            $resp = '';
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                $resp = "<option value='".$row['id_patron']."'> ".utf8_encode($row['descripcion'])."</option>";
                echo $resp;
            }
            return $resp;
            

        }catch(PDOException $e){

        }
    }   

}
    ?>