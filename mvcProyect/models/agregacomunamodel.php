<?php
class agregacomunaModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }

public function cargaregion($id_reg_region){ 
    $id_reg_region = $_GET['id_reg_region']; 
    $respuesta = array();//para obtener todos los datos defines un vector o un arreglo
    $conn = $this->db->connect();
    $query = $conn->prepare("select descripcion from region where id_reg='$id_reg_region'");
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

public function guardacomuna($descripcion,$id_reg_region){
    $descripcion = $_POST['txt_desc'];
    $region = $_POST['id_reg_region'];
    $respuesta = array();//para obtener todos los datos defines un vector o un arreglo
    $conn = $this->db->connect();
    $query = $conn->prepare("insert into comuna (descripcion,id_reg_Region) values ('$descripcion','$region')");
    //$dtype = "ss";
    //$query->bind_param($dtype,$data['usr'], $data['pss']);
    $query->execute();
    //$query->bind_result($rs);
    //$query->fetch();
    $rs = $query->get_result();
    //$respuesta = '';
    /*while($row = mysqli_fetch_array($rs)){//en el while por cada vuelta del ciclo se hace un array push, esto para concatenar
        //los resultados
        array_push($respuesta, $row);
    }*/
    return $respuesta;//devuelves el arreglo
}

}
?>