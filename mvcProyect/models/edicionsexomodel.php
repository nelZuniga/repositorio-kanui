<?php
class edicionsexoModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }
   

public function cargasexo($id_sex){
    $id_sex = $_GET['id_sex']; 
    $respuesta = array();//para obtener todos los datos defines un vector o un arreglo
    $conn = $this->db->connect();
    $query = $conn->prepare("select * from sexo where id_sex='$id_sex'");
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

public function guardasexo($id_sex,$descripcion){
    $id_sex = $_POST['id_sex']; 
    $descripcion = $_POST['txt_desc']; 
    $respuesta = array();//para obtener todos los datos defines un vector o un arreglo
    $conn = $this->db->connect();
    $query = $conn->prepare("update sexo set descripcion='$descripcion' where id_sex='$id_sex'");
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