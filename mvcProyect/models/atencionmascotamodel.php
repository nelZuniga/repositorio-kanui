<?php
include_once'models/raza.php';
class atencionmascotaModel extends Model{

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
        $sql = "select  distinct M.id_mascot as id, M.nombre as nombre , TM.descripcion as tipo, R.descripcion as raza, S.descripcion as sexo
        from mascota M 
        left outer join tipo_mascota TM ON M.tipo_mascota=TM.id_tmasc 
        left outer join sexo S ON S.id_sex =  M.sexo 
        left outer join raza R ON R.id_raza = M.raza 
        left outer join procedimiento P ON P.id_mascot = M.id_mascot
        where id_propietario = '".$documento."' and estado = 1";
        $conn = $this->db->connect();
        try{
            $resp = '';
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                $respuesta['data']['mascotas'][] = $row;
                
            }
            echo json_encode($this->utf8ize( $respuesta));
            return $respuesta;
        }catch(PDOException $e){

        }
    }

    function utf8ize( $mixed ) {
        if (is_array($mixed)) {
            foreach ($mixed as $key => $value) {
                $mixed[$key] = $this->utf8ize($value);
            }
        } elseif (is_string($mixed)) {
            return mb_convert_encoding($mixed, "UTF-8", "UTF-8");
        }
        return $mixed;
    }

    public function getMascota2($usuario){
        $respuesta = array();
        $documento = $usuario;
        $sql = "select  distinct M.id_mascot as id, M.nombre as nombre , TM.descripcion as tipo, R.descripcion as raza, S.descripcion as sexo
        from mascota M 
        left outer join tipo_mascota TM ON M.tipo_mascota=TM.id_tmasc 
        left outer join sexo S ON S.id_sex =  M.sexo 
        left outer join raza R ON R.id_raza = M.raza 
        left outer join procedimiento P ON P.id_mascot = M.id_mascot
        where id_propietario = '".$documento."' and estado = 1";
        $conn = $this->db->connect();
        try{
            $resp = '';
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                $respuesta['data']['mascotas'][] = $row;
                
            }
            echo json_encode($this->utf8ize( $respuesta));
            return $respuesta;
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
and M.id_propietario = U.id_usr
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

}



    ?>