<?php
class edicionvacunaModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }

public function cargavacuna($id_vac){
    $id_vac = $_GET['id_vac']; 
    $respuesta = array();//para obtener todos los datos defines un vector o un arreglo
    $conn = $this->db->connect();
    $query = $conn->prepare("select * from vacunas where id_vac='$id_vac'");
    //$dtype = "ss";
    //$query->bind_param($dtype,$data['usr'], $data['pss']);
    $query->execute();
    //$query->bind_result($rs);
    //$query->fetch();
    $rs = $query->get_result();
    //$respuesta = '';
    while($row = mysqli_fetch_array($rs)){//en el while por cada vuelta del ciclo se hace un array push, esto para concatenar
        //los resultados
        array_push($respuesta, $row);
    }
    return $respuesta;//devuelves el arreglo
}

public function edicionvacuna($id_vac,$descripcion){
    $respuesta = array();
    $conn = $this->db->connect();
    $query = $conn->prepare("update vacunas set descripcion='$descripcion' where id_vac='$id_tusr'");
    $query->execute();
    $rs = $query->get_result();
    return $respuesta;//devuelves el arreglo
}

}
?>