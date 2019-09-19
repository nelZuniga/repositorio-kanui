<?php
class agregavacunaModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }


    public function saveVacuna($data){
            //insertar data
        $conn = $this->db->connect();
        $query = $conn->prepare("insert into vacunas(descripcion)
                    values(?)");
                    $ss = 's';
                    $estado = 1;
        $query->bind_param($ss, $data);
        $retorno = false;
        if($query->execute()){
                $retorno = true;
        };
        return $retorno;
        

    }

    


}
?>