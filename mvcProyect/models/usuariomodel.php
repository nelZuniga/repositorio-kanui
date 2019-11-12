<?php
class usuarioModel extends Model{

public function __construct()
{
    parent::__construct();
}

    public function checkCorreo($correo){
        $sql = "SELECT count(*) as correo from sys_log where sys_usr = '".$correo."'";
        //echo $sql;
        $conn = $this->db->connect();
        try{
            $resp = 0;
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                $resp = $row['correo'];
                echo $resp;
            }
            return $resp;
            

        }catch(PDOException $e){

        }
    }


}
?>