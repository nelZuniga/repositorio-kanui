<?php
class apiModel extends Model{

public function __construct()
{
    parent::__construct();
}

public function login($data){
 //var_dump($data);
    $conn = $this->db->connect();
        $query = $conn->prepare("select id_usr from sys_log where sys_usr = ? and sys_pwd = ?");
        $dtype = "ss";
        $query->bind_param($dtype,$data['usr'], $data['pss']);
        $query->execute();

        $query->bind_result($rs);
        $query->fetch();
        //$retorno = 'false';
        if($rs !== 0 && !is_null($rs)){
            $data = ["Ingreso"=>true, "id_usr" => $rs];
        }else{
            $data = ["Ingreso"=>false, "id_usr" => $rs];
        }

        echo json_encode($data);
        
}
public function getdata($data){
        
    $conn = $this->db->connect();
        $query = $conn->prepare("SELECT nombres, apellido_paterno, apellido_materno, documento, correo
        from usuario
        where id_usr = ?");

        $dtype = "i";
        $query->bind_param($dtype,$data['usr']);
        $query->execute();
        $rs = $query->get_result();
        $query->fetch();
        $rest = [];
        while($row = mysqli_fetch_array($rs)){
            $rest = ["nombres"=>$row['nombres'],
            "apellido_paterno"=> $row['apellido_paterno'],
            "apellido_materno"=>$row['apellido_materno'],
            "documento"=>$row['documento'], 
            "correo"=>$row['correo']];
        }
        echo json_encode($rest);
        //$retorno = 'false';
        
    }  


    public function getpet($data){
        
        $conn = $this->db->connect();
            $query = $conn->prepare("SELECT n_chip 
            FROM `mascota` WHERE n_chip = ?");
    
            $dtype = "i";
            $query->bind_param($dtype,$data['chip']);
            $query->execute();
            $query->bind_result($rs);
            $query->fetch();
            if($rs!==0 && !is_null($rs)){
                $rest =  $this->getdatadueño($data);

            }
            echo json_encode($rest);
    }  

    public function getdatadueño($data){
        $conn = $this->db->connect();
        $query = $conn->prepare("SELECT  m.nombre as nombre, u.nombres as nombres, u.apellido_paterno as apellido ,u.cel as tel
        FROM mascota m
        inner join usuario u on u.id_usr = m.id_propietario
        where m.n_chip = ?");

        $dtype = "i";
        $query->bind_param($dtype,$data['chip']);
        $query->execute();
        $rs = $query->get_result();
        $query->fetch();
        while($row = mysqli_fetch_array($rs)){
            $rest = ["nombre"=>$row['nombre'],
            "nombre"=> $row['nombres'],
            "apellido"=> $row['apellido'],
            "tel"=>$row['tel']];
        }
        return $rest;
    }
    
}


?>