<?php
include_once'models/raza.php';
class edicionmascotaModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }
    

    public function getMascota($usuario){
        $respuesta = array();
        $documento = $usuario;
        $sql = "select M.id_mascot, M.nombre, TM.descripcion, R.descripcion, S.descripcion, M.color, M.patron
                    from mascota M, tipo_mascota TM, sexo S, raza R
                    where M.tipo_mascota=TM.id_tmasc
                    and M.sexo=S.id_sex
                    and M.raza=R.id_raza
                    and id_propietario = '".$usuario."' and estado = 1";
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
        UPDATE mascota SET nombre = ?, tipo_mascota = ?, sexo = ?, raza = ?, fecha_nac = ?, observaciones = ? , imgMascota = ?, patron = ?, color = ? WHERE id_mascot = ?");
                    $ss = 'siissssiii';
                    $query->bind_param($ss ,$data['nombre'], $data['tipo_mascota'], $data['sexo'],$data['raza'],$data['fecha_nac'],$data['obs'] ,$data['img'],$data['patron'],$data['color'], $data['idmascot']);
        $retorno = false;
        
        if($query->execute()){
                $retorno = true;
        };
        return $retorno;
    }


    public function getEditMascota($id){
        $respuesta = array();
        $id = $id;
        $sql = "select * from mascota where id_mascot = '".$id."' and estado = 1";
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

    public function getColores(){
        $respuesta = array();
        $sql = "select * from colores";
        $conn = $this->db->connect();
        try{
            $resp = '';
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                $respuesta[] = $row;
            }
            header('Content-type: application/json');
            echo json_encode($respuesta);
            return json_encode($respuesta);
        }catch(PDOException $e){

        }
    }

    public function getPatrones(){
        $respuesta = array();
        $sql = "select * from patrones";
        $conn = $this->db->connect();
        try{
            $resp = '';
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                $respuesta[] = $row;
            }
            header('Content-type: application/json');
            echo json_encode($respuesta);
            return json_encode($respuesta);
        }catch(PDOException $e){

        }
    }

}



    ?>