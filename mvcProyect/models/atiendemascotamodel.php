<?php
include_once'models/raza.php';
class atiendemascotaModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }
    
public function atiendeMascota($idmascot,$pesoM,$id_vac,$dosis,$FechaPA,$id_control,$observacionA){
        $idmascot = $_POST['idmascot'];
        $pesoM = $_POST['pesoM'];
        $id_vac = $_POST['id_vac'];
        $dosis = $_POST['dosis'];
        $FechaPA = $_POST['FechaPA'];
        $id_control = $_POST['id_control'];
        $observacionA = $_POST['observacionA'];
    $respuesta = array();//para obtener todos los datos defines un vector o un arreglo
    $conn = $this->db->connect();
    $query = $conn->prepare("insert into procedimiento (id_proc,id_mascot,id_vet,id_vac,id_control,dosis,peso,fecha_atencion,observaciones,fecha_prox) 
        values ('','$idmascot','1','$id_vac','$id_control','$dosis','$pesoM',CURDATE(),'$observacionA','$FechaPA')");
    $query->execute();

    $rs = $query->get_result();

    return $respuesta;//devuelves el arreglo
}

}

    ?>