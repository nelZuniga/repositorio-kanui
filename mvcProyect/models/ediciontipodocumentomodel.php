<?php
class ediciontipodocumentoModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }
   

public function cargatipodocumento($id_tdoc){
    $id_tdoc = $_GET['id_tdoc']; 
    $respuesta = array();//para obtener todos los datos defines un vector o un arreglo
    $conn = $this->db->connect();
    $query = $conn->prepare("select * from tipo_documento where id_tdoc='$id_tdoc'");
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

public function guardatipodocumento($id_tdoc,$descripcion,$abreviatura){
    $id_tdoc = $_POST['id_tdoc']; 
    $descripcion = $_POST['txt_desc']; 
    $abreviatura = $_POST['txt_abre'];
    $respuesta = array();//para obtener todos los datos defines un vector o un arreglo
    $conn = $this->db->connect();
    $query = $conn->prepare("update tipo_documento set descripcion='$descripcion', abreviatura='$abreviatura' where id_tdoc='$id_tdoc'");
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