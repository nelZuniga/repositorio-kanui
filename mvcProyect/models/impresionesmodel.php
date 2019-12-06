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

public function getVacunas($id){
    $respuesta = array();
    $id = $id;
    $conn = $this->db->connect(); 
    $consulta = "Select vac.descripcion, proc.fecha_atencion, fu.nombres, fu.apellido_paterno
    from mascota ma
    inner join usuario u on u.id_usr = ma.id_propietario
    inner join procedimiento proc  on proc.id_mascot = ma.id_mascot
    inner join usuario fu on fu.id_usr = proc.id_vet
    inner join vacunas vac on vac.id_vac = proc.id_vac
    where ma.id_mascot = ?";       
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


public function getDecMascota($id){
    $respuesta = array();
    $id = $id;
    $conn = $this->db->connect(); 
    $consulta = "SELECT U.nombres,U.apellido_paterno,U.apellido_materno,documento,
U.direccion, CM.descripcion as COMUNA, RG.descripcion as REGION, U.cel, U.correo , M.nombre ,
tm.descripcion as ESPECIE, S.descripcion as SEXO, R.descripcion as RAZA, CL.descripcion as COLOR, 
PT.descripcion as PATRON, M.fecha_nac, M.n_chip
FROM mascota M, raza R, tipo_mascota tm, usuario U, comuna CM, region RG, sexo S, colores CL, patrones PT
WHERE M.id_mascot = ?
AND R.id_raza = M.raza
AND tm.id_tmasc = M.tipo_mascota
AND M.id_propietario = U.id_usr
AND U.comuna = CM.id_com
AND RG.id_reg = CM.id_reg_region
AND M.sexo = S.id_sex
AND M.color = CL.id_color
AND M.patron = PT.id_patron";

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