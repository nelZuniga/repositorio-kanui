<?php
include_once'models/raza.php';
class registromascotasModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }
     public function insert($data){
        //insertar data
        $conn = $this->db->connect();
        $query = $conn->prepare("insert into mascota(n_chip, id_propietario, nombre, fecha_nac, tipo_mascota, sexo)
                    values(?,?,?,?,?,?)");
                    $ss = 'iissii';
                    $estado = 1;
        $query->bind_param($ss, $data['n_chip'], $data['id_propietario'], $data['nombre'], $data['fecha_nac'], $data['tipo_mascota'], $data['sexo']);
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
    public function getRaza($tipo){
        $sql = 'SELECT * from raza where tipoRaza = '.$tipo;
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


}

    ?>