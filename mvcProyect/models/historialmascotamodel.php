<?php
include_once'models/raza.php';
class historialmascotaModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function getVacunas(){
        $sql = 'SELECT * from vacunas';
        $conn = $this->db->connect();
        try{
            $resp = '';
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                $resp = "<option value='".$row['id_vac']."'> ".utf8_encode($row['descripcion'])."</option>";
                echo $resp;
            }
            return $resp;
            

        }catch(PDOException $e){

        }
    }

    public function getControles(){
        $sql = 'SELECT * from controles';
        $conn = $this->db->connect();
        try{
            $resp = '';
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                $resp = "<option value='".$row['id_control']."'> ".utf8_encode($row['descripcion'])."</option>";
                echo $resp;
            }
            return $resp;
            

        }catch(PDOException $e){

        }
    }

    public function getCertificado($id){
        $respuesta = array();
        $id = $id;
        $conn = $this->db->connect();        
        $query = $conn->prepare( "select 
        CONCAT(U.nombres,' ',U.apellido_paterno,' ',U.apellido_materno) duenio,
        U.documento,
        CONCAT(U.direccion,', ',CM.descripcion,', Región ',RG.descripcion) direccion,
        M.n_chip,
        M.nombre,
        P.fecha_atencion,
        P.fecha_prox,
        V.descripcion,
        P.dosis,
        C.descripcion,
        M.fecha_nac,
        YEAR(CURDATE()) - YEAR(M.fecha_nac) + IF(
                DATE_FORMAT(CURDATE(), '%m-%d') > DATE_FORMAT(M.fecha_nac, '%m-%d'),
                0,
                -1) AS EDAD,
        P.peso,
        P.observaciones,
        P.id_proc,
        R.descripcion raza,
        M.fecha_nac,
        tm.descripcion tipo,
        CONCAT(vet.nombres,' ',vet.apellido_paterno,' ',vet.apellido_materno) vet
        FROM procedimiento P
        inner join mascota M on M.id_mascot = P.id_mascot 
        left outer join vacunas V on V.id_vac = P.id_vac
        inner join controles C on C.id_control = P.id_control
        inner join raza R on R.id_raza = M.raza
        inner join tipo_mascota tm on tm.id_tmasc = M.tipo_mascota
        inner join usuario U on U.id_usr = M.id_propietario
        inner join comuna CM on CM.id_com = U.comuna
        inner join region RG on RG.id_reg = CM.id_reg_region
        inner join usuario vet on vet.id_usr = P.id_vet
        WHERE P.id_mascot = '".$id."'
        AND P.id_proc = (select max(id_proc) from procedimiento where id_mascot = '".$id."')");
        $query->execute();
        $rs = $query->get_result();
        
    while($row = mysqli_fetch_array($rs)){//en el while por cada vuelta del ciclo se hace un array push, esto para concatenar
        //los resultados
        array_push($respuesta, $row);
    }
    return $respuesta;//devuelves el arreglo
    
    }

    public function getMascota($usuario){
        $respuesta = array();
        $documento = $usuario;
        $sql = "select M.id_mascot, M.nombre, TM.descripcion, R.descripcion, S.descripcion
                    from mascota M, tipo_mascota TM, sexo S, raza R
                    where M.tipo_mascota=TM.id_tmasc
                    and M.sexo=S.id_sex
                    and M.raza=R.id_raza
                    and id_propietario = '".$usuario."' and estado = 1";
        //$sql = "select id_mascot,n_chip,id_propietario, sexo,tipo_mascota,imgMascota from mascota where id_propietario = '".$usuario."' and estado = 1";
        $conn = $this->db->connect();
        try{
            $resp = '';
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                /*$resp = "<tr><td>".$row['id_usr']."</td><td>".$row['nombres']."</td><td>".$row['apellido_paterno']."</td><td>".$row['apellido_materno']."</td></tr>";
                echo $resp;*/
                $respuesta['data']['mascotas'][] = $row;
                
            }
            echo json_encode($respuesta);
            return json_encode($respuesta);
        }catch(PDOException $e){

        }
    }

    public function edit($data){
        //insertar data
        $conn = $this->db->connect();
        $query = $conn->prepare("
        UPDATE mascota SET nombre = ?, tipo_mascota = ?, sexo = ?, raza = ?, fecha_nac = ?, observaciones = ? , imgMascota = ? WHERE id_mascot = ?");
                    $ss = 'siissssi';
                    $query->bind_param($ss ,$data['nombre'], $data['tipo_mascota'], $data['sexo'],$data['raza'],$data['fecha_nac'],$data['obs'] ,$data['img'], $data['idmascot']);
        $retorno = false;
        
        if($query->execute()){
                $retorno = true;
        };
        return $retorno;
    }


    public function getEditMascota($id){
        $respuesta = array();
        $id = $id;
        //$sql = "select * from mascota where id_mascot = '".$id."' and estado = 1";

        $sql = "select M.id_mascot, M.n_chip, M.nombre, TM.descripcion, R.descripcion, M.fecha_nac, 
M.observaciones, U.documento, 
U.apellido_paterno, U.apellido_materno, U.nombres
from mascota M, usuario U, raza R, tipo_mascota TM
where M.id_mascot = '".$id."'
and M.estado = 1
and M.id_propietario = U.documento
and M.raza = R.id_raza
and M.tipo_mascota = TM.id_tmasc";
        $conn = $this->db->connect();
        try{
            $resp = '';
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                $respuesta = $row;
                
            }
            //var_dump($respuesta);
            return $respuesta;
        }catch(PDOException $e){

        }
    
    }

    public function getHistorialMascota($id){
        $respuesta = array();
        $id = $id;
        $conn = $this->db->connect();        
        $query = $conn->prepare("SELECT M.nombre, P.fecha_atencion, P.fecha_prox, V.descripcion, P.dosis, 
        C.descripcion, P.peso, P.observaciones, id_proc, R.descripcion raza, M.fecha_nac, tm.descripcion tipo
        FROM procedimiento P, mascota M, vacunas V, controles C, raza R, tipo_mascota tm
WHERE P.id_mascot = '".$id."' 
AND P.id_mascot = M.id_mascot
AND P.id_vac = V.id_vac
AND P.id_control = C.id_control
AND R.id_raza = M.raza
AND tm.id_tmasc = M.tipo_mascota");
        $query->execute();
        $rs = $query->get_result();
        
    while($row = mysqli_fetch_array($rs)){//en el while por cada vuelta del ciclo se hace un array push, esto para concatenar
        //los resultados
        array_push($respuesta, $row);
    }
    return $respuesta;//devuelves el arreglo
    
    }


public function cargatipomascota(){
    $respuesta = array();//para obtener todos los datos defines un vector o un arreglo
    $conn = $this->db->connect();
    $query = $conn->prepare("select * from tipo_mascota");
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

}
