<?php
class edicionregionModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }
   

public function cargaregion($id_reg){
    $id_reg = $_GET['id_reg']; 
    $respuesta = array();//para obtener todos los datos defines un vector o un arreglo
    $conn = $this->db->connect();
    $query = $conn->prepare("select * from region where id_reg='$id_reg'");
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

public function guardaregion($id_reg,$descripcion,$simbolo,$orden){
    $id_reg= $_POST['id_reg']; 
    $descripcion = $_POST['txt_desc'];
    $simbolo = $_POST['txt_simbolo'];
    $orden= $_POST['txt_orden'];
    $respuesta = array();//para obtener todos los datos defines un vector o un arreglo
    $conn = $this->db->connect();
    $query = $conn->prepare("update region set descripcion='$descripcion',simbolo='$simbolo',orden='$orden' where id_reg='$id_reg'");
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