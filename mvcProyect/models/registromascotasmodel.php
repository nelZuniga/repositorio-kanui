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
                $resp = "<option value='".$row['id_raza']."'> ".$row['descripcion']."</option>";
                echo $resp;
            }
            return $resp;
            

        }catch(PDOException $e){

        }
    }
}

    ?>