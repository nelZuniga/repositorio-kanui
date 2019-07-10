<?php

class loginModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function verf($data){
        $conn = $this->db->connect();
        $query = $conn->prepare("select id_usr from sys_log where sys_usr = ? and sys_pwd = ?");
        $dtype = "ss";
        $query->bind_param($dtype,$data['usuario'], $data['pass']);
        $query->execute();

        $query->bind_result($rs);
        $query->fetch();
        $retorno = 'false';
        return $rs;
        //echo $retorno;
        
    }

    public function startsesion($id){
        $conn = $this->db->connect();
        $query = $conn->prepare("select id_usr, nombres, apellido_paterno,apellido_materno,documento, estado from usuario where id_usr = ?");
        $dtype = "i";
        $query->bind_param($dtype,$id);
        $query->execute();
        $rs = $query->get_result();
        if($row = mysqli_fetch_array($rs)){
            session_start();
            $_SESSION['id_usr'] = $row['id_usr'];
            $_SESSION['nombres'] = $row['nombres'];
            $_SESSION['apellido_paterno'] = $row['apellido_paterno'];
            $_SESSION['apellido_materno'] = $row['apellido_materno'];
            $_SESSION['documento'] = $row['documento'];
            $_SESSION['estado'] = $row['estado'];
        }
        //return $rs;


    }

}

    ?>