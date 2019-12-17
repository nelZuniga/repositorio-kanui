<?php
class seguridadModel extends Model{
 
    public function __construct()
    {
        parent::__construct();
    }

    function getItemsMuestra(){
        $respuesta = array();
            $conn = $this->db->connect();
                $query = $conn->prepare("select id_mustr, campo from datos_muestra");
                $query->execute();
                $rs = $query->get_result();
                $query->fetch();
                while($row = mysqli_fetch_array($rs)){
                    $respuesta[] = $row;
                }
                
                return $respuesta;
    }
    function getvaluesMuestra($user){
        $respuesta = array();
            $conn = $this->db->connect();
                $query = $conn->prepare("select * from seg_data where id_usr = ".$user."");
                $query->execute();
                $rs = $query->get_result();
                $query->fetch();
                while($row = mysqli_fetch_array($rs)){
                    $respuesta[] = $row;
                }
                
                return $respuesta;
    }

        function comprobar($idusr, $attr){
            $conn = $this->db->connect();
                $query = $conn->prepare("select * from seg_data where id_usr = '".$idusr."' and id_attr= '".$attr."'");
                $query->execute();
                $rs = $query->get_result();
                $query->fetch();
                $respuesta = false;
                while($row = mysqli_fetch_array($rs)){
                    $respuesta = true;
                }
                return $respuesta;
    }
    public function guardadata($usuario, $attr, $valor){
        if($valor == 'on'){
            $valor = 1;
        }else{
            $valor = 0;
        }
        $conn = $this->db->connect();
        $query = $conn->prepare("
        INSERT INTO seg_data  (id_usr,id_attr,val)  
        VALUES ( ? , ? , ? )");
        if($query == false){
            return ["ok"=>'false'];
        }
                    $ss = 'iis';
                    $query->bind_param($ss,$usuario,$attr,$valor);
        $retorno = false;
        if($query->execute()){
                $retorno = true;
        };
        return $retorno;
    }

    public function actualizadata($usuario, $attr, $valor){
        if($valor == 'on'){
            $valor = 1;
        }else{
            $valor = 0;
        }
        $conn = $this->db->connect();
        $query = $conn->prepare("
        UPDATE seg_data 
        SET val = ? 
        WHERE id_usr = ? and id_attr = ?");
                    $ss = 'iii';
                    $query->bind_param($ss ,$valor, $usuario, $attr);
        $retorno = false;
        if($query->execute()){
                $retorno = true;
        };
        return $retorno;
    }


    function confSeg($data){
        foreach ($data as $valor =>$v) {
            if($valor!== "usuario"){
                if(!$this->comprobar($data['usuario'], $valor)){
                    //insert
                    echo $v;
                    $this->guardadata($data['usuario'], $valor, $v);

                }else{
                    //update
                    $this->actualizadata($data['usuario'], $valor, $v);
                }
                //echo $valor."-".$v;
            }
            
        }
    }
    
}?>