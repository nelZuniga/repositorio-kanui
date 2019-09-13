<?php
class ediciontipousuarioModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }
   

public function cargatipousuario($id_tusr){
    $id_tusr = $_GET['id_tusr']; 
    $respuesta = array();//para obtener todos los datos defines un vector o un arreglo
    $conn = $this->db->connect();
    $query = $conn->prepare("select * from tipo_usuario where id_tusr='$id_tusr'");
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

public function guardatipousuario($id_tusr,$descripcion){
    $id_tusr = $_POST['id_tusr']; 
    $descripcion = $_POST['txt_desc']; 
    $respuesta = array();//para obtener todos los datos defines un vector o un arreglo
    $conn = $this->db->connect();
    $query = $conn->prepare("update tipo_usuario set descripcion='$descripcion' where id_tusr='$id_tusr'");
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