<?php
class ediciontipomascotaModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }
   

public function cargatipomascota($id_tmasc){
    $id_tmasc = $_GET['id_tmasc']; 
    $respuesta = array();//para obtener todos los datos defines un vector o un arreglo
    $conn = $this->db->connect();
    $query = $conn->prepare("select * from tipo_mascota where id_tmasc='$id_tmasc'");
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
}
?>