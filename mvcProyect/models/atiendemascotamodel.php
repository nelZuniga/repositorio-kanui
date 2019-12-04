<?php
include_once'models/raza.php';
class atiendemascotaModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }
    
public function atiendeMascota($idmascot,$pesoM,$id_vac,$dosis,$FechaPA,$id_control,$observacionA,$id_vet){
    $respuesta = array();//para obtener todos los datos defines un vector o un arreglo
    $conn = $this->db->connect();
    $query = $conn->prepare("insert into procedimiento (id_proc,id_mascot,id_vet,id_vac,id_control,dosis,peso,fecha_atencion,observaciones,fecha_prox) 
        values ('','$idmascot','.$id_vet.','$id_vac','$id_control','$dosis','$pesoM',CURDATE(),'$observacionA','$FechaPA')");
    $query->execute();

    $rs = $query->get_result();

    return $respuesta;//devuelves el arreglo
}

}

    ?>