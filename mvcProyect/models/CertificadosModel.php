<?php
class CertificadosModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }
    
public function getCardMascota($idmascot){
    $respuesta = array();
        $id = $idmascot;
        //$sql = "select * from mascota where id_mascot = '".$id."' and estado = 1";

        $sql = "select M.id_mascot, M.n_chip, M.nombre, TM.descripcion, R.descripcion, M.fecha_nac,M.imgMascota, 
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