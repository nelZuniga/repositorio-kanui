<?php
class listatipomascotaModel extends Model{

public function __construct()
{
    parent::__construct();
}

public function cargatipomascota(){
    $conn = $this->db->connect();
    $query = $conn->prepare("select * from tipo_mascota");
    //$dtype = "ss";
    //$query->bind_param($dtype,$data['usr'], $data['pss']);
    $query->execute();
    //$query->bind_result($rs);
    //$query->fetch();
    $rs = $query->get_result();
    var_dump($rs);
    $respuesta = '';
    while($row = mysqli_fetch_array($rs)){
        //echo $row[0]."<BR>";
        //$respuesta = ["id"=>$row[0],"nombre"=>$row[1]];
        echo json_encode($row);
    }
    return $respuesta;
}


}
?>