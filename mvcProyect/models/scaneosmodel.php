<?php
class scaneosModel extends Model{
 
    public function __construct()
    {
        parent::__construct();
    }

    function getScansMascota($id_mascot){
        $respuesta = array();
            $conn = $this->db->connect();
                $query = $conn->prepare("select id_scan, 
                s.id_usr idotro, 
                s.id_mascot, 
                u.nombres nomotro, 
                u.apellido_paterno apepotro, 
                u.apellido_materno apemotro, 
                us.nombres nomDueno, 
                us.apellido_paterno apepDueno, 
                us.apellido_materno apemDueno, 
                us.id_usr id_dueno, 
                DATE_FORMAT(s.fecha, '%m/%d/%Y %H:%i') as fecha,
                s.lat ,
                s.longitud
                from scans s
                inner join usuario u on u.id_usr = s.id_usr
                inner join mascota m on m.id_mascot = s.id_mascot
                inner join usuario us on us.id_usr = m.id_propietario
                where s.id_mascot = ?");
                $dtype = "i";
                $query->bind_param($dtype,$id_mascot);
                $query->execute();
                $rs = $query->get_result();
                $query->fetch();
                while($row = mysqli_fetch_array($rs)){
                    $respuesta[] = $row;
                }
                
                return $respuesta;
    }

    function getScanDetalle(){

    }

    public function getMascota($usuario){
        $respuesta = array();
        $documento = $usuario;
        $sql = "select distinct M.id_mascot, M.nombre, TM.descripcion, R.descripcion, S.descripcion
                    from mascota M, tipo_mascota TM, sexo S, raza R, scans scan
                    where M.tipo_mascota=TM.id_tmasc
                    and M.sexo=S.id_sex
                    and M.raza=R.id_raza
                    and scan.id_mascot = M.id_mascot
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
}
?>