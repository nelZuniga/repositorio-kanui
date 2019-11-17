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
        //Sentencia Original 11-Nov-2019
        //$query = $conn->prepare("select id_usr, nombres, apellido_paterno,apellido_materno,documento, estado from usuario where id_usr = ?");
        // Nueva Sentencia 11-Nov-2019
        $query = $conn->prepare("select U.id_usr, U.nombres, U.apellido_paterno, U.apellido_materno, U.documento, U.direccion, U.tipo_usr, C.id_com, C.descripcion, U.correo, U.cel, U.estado ,U.img_usr from usuario U, comuna C where U.comuna = C.id_com and id_usr = ?");
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
            $_SESSION['tipo_usr'] = $row['tipo_usr'];
            $_SESSION['direccion'] = $row['direccion'];
            $_SESSION['id_com'] = $row['id_com'];
            $_SESSION['comuna'] = $row['descripcion'];
            $_SESSION['correo'] = $row['correo'];
            $_SESSION['cel'] = $row['cel'];
            $_SESSION['estado'] = $row['estado'];
            $_SESSION['perfil'] = $row['img_usr'];
        }
        //return $rs;


    }

}

    ?>