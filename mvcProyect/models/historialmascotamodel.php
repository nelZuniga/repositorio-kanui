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
        C.descripcion, P.peso, P.observaciones
        FROM procedimiento P, mascota M, vacunas V, controles C
WHERE P.id_mascot = '".$id."' 
AND P.id_mascot = M.id_mascot
AND P.id_vac = V.id_vac
AND P.id_control = C.id_control");
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



    ?>