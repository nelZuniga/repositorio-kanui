<?php
class scaneosModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    function getScansMascota($id_mascot){
        $respuesta = array();
            $conn = $this->db->connect();
                $query = $conn->prepare("select id_scan, s.id_usr idotro, s.id_mascot, u.nombres nomotro, u.apellido_paterno apepotro, u.apellido_materno apemotro, us.nombres nomDueno, us.apellido_paterno apepDueno, us.apellido_materno apemDueno, us.id_usr id_dueno
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
                header('Content-Type: application/json');
                echo json_encode($respuesta);
    }

    function getScanDetalle(){

    }
}
?>