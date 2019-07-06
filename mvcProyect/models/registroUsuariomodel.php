<?php
include_once'models/region.php';
class RegistroUsuarioModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }


    public function insert(){
        //insertar data
        echo "insertodata";
        
    }
    public function getregion(){
        $sql = 'SELECT * from region order by orden';
        $conn = $this->db->connect();
        try{
            $resp = '';
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                $resp = "<option value='".$row['id_reg']."'> ".$row['descripcion']."</option>";
                echo $resp;
            }
            return $resp;
            

        }catch(PDOException $e){

        }
    }

    public function getcomuna($idreg){
        $sql = 'SELECT * from region where id_reg_region = '.$idreg;
        $conn = $this->db->connect();
        try{
            $resp = '';
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                $resp = "<option value='".$row['id_com']."'> ".$row['descripcion']."</option>";
                echo $resp;
            }
            return $resp;
            

        }catch(PDOException $e){

        }
    }
}
?>