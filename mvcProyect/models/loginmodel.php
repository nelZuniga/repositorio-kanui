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

}

    ?>