<?php
class agregapatronModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }
   

public function cargapatron($id_patron){
    $id_patron = $_GET['id_patron']; 
    $respuesta = array();//para obtener todos los datos defines un vector o un arreglo
    $conn = $this->db->connect();
    $query = $conn->prepare("select * from colores where id_patron='$id_patron'");
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

public function guardapatron($descripcion){
    $descripcion = $_POST['txt_desc']; 
    $respuesta = array();//para obtener todos los datos defines un vector o un arreglo
    $conn = $this->db->connect();
    $query = $conn->prepare("insert into patrones (descripcion) values ('$descripcion')");
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