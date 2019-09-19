<?php
class listatipovacunaModel extends Model{

public function __construct()
{
    parent::__construct();
}

public function cargavacunas(){
    $respuesta = array();
    $conn = $this->db->connect();
    $query = $conn->prepare("select * from vacunas");
    $query->execute();
    $rs = $query->get_result();
    while($row = mysqli_fetch_array($rs)){
        array_push($respuesta, $row);
    }
    return $respuesta;
}

}
?>