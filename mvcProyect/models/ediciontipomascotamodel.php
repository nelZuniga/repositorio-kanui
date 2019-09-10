<?php
class ediciontipomascotaModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }
   

    public function cargatipomascota($id_tmasc){
        $respuesta = array();
        $id = $id_tmasc;
        $sql = "select id_tmasc,descripcion from tipo_mascota where id_tmasc = '".$id_tmasc."'";
        $conn = $this->db->connect();
        try{
            $resp = '';
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                /*$resp = "<tr><td>".$row['id_tmasc']."</td><td>".$row['descripcion']."</td></tr>";
                echo $resp;*/
                $respuesta['data']['tipo_mascota'][] = $row;
            }
            echo json_encode($respuesta);
            return json_encode($respuesta);
        }catch(PDOException $e){

        }
    }

}
?>