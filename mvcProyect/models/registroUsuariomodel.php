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
            $items = [];
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                /*$item = new region();
                $item->id_reg = $row['id_reg'];
                $item->descripcion = $row['descripcion'];
                $item->simbolo = $row['simbolo'];
                array_push($items, $item);*/
                echo json_encode($row);
            }
            
            return $items;
            

        }catch(PDOException $e){

        }
    }
}
?>