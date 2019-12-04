<?php
class impresionesModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }



public function getHistorialMascota($id){
    $respuesta = array();
    $id = $id;
    $conn = $this->db->connect(); 
    $consulta = "SELECT m.n_chip, m.nombre, tm.descripcion, ra.descripcion , DATE_FORMAT(m.fecha_nac,'%d/%m/%Y') , u.documento , CONCAT(u.nombres, ' ',u.apellido_paterno,' ',u.apellido_materno) , m.observaciones masco,p.peso , va.descripcion , p.dosis , DATE_FORMAT(p.fecha_prox,'%d/%m/%Y') , con.descripcion, p.observaciones FROM procedimiento p inner join mascota m on m.id_mascot = p.id_mascot inner join usuario u on u.id_usr = m.id_propietario inner join tipo_mascota tm on tm.id_tmasc = m.tipo_mascota inner join raza ra on ra.id_raza = m.raza left outer join vacunas va on va.id_vac = p.id_vac left outer join controles con on con.id_control = p.id_control WHERE id_proc = ?";       
    $query = $conn->prepare($consulta);
    $ss = 'i';
    $query->bind_param($ss,$id);
    $query->execute();
    $rs = $query->get_result();
while($row = mysqli_fetch_array($rs)){//en el while por cada vuelta del ciclo se hace un array push, esto para concatenar
    //los resultados
    array_push($respuesta, $row);
}
return $respuesta;//devuelves el arreglo

}

public function getInsMascota($id){
    $respuesta = array();
    $id = $id;
    $conn = $this->db->connect(); 
    $consulta = "select
    id_mascot,
    n_chip, 
    nombre, 
    ra.descripcion, 
    u.nombres, 
    u.apellido_paterno, 
    u.apellido_materno,
    DATE_FORMAT(ma.fecha_crea,'%d/%m/%Y') as creacion,
    DATE_FORMAT(ma.fecha_nac,'%d/%m/%Y') as nacimiento
    from mascota ma
    inner join raza ra on ra.id_raza = ma.raza
    inner join usuario u on u.id_usr = ma.id_propietario
    WHERE ma.id_mascot = ?";       
    $query = $conn->prepare($consulta);
    $ss = 'i';
    $query->bind_param($ss,$id);
    $query->execute();
    $rs = $query->get_result();
while($row = mysqli_fetch_array($rs)){//en el while por cada vuelta del ciclo se hace un array push, esto para concatenar
    //los resultados
    array_push($respuesta, $row);
}
return $respuesta;//devuelves el arreglo

}


}
?>