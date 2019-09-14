<?php
class listacomunaregionModel extends Model{

public function __construct()
{
    parent::__construct();
}

public function cargacomunaregion($id_reg_region){
    $respuesta = array();//para obtener todos los datos defines un vector o un arreglo
    $region = $id_reg_region;
    $conn = $this->db->connect();
    $query = $conn->prepare("select * from comuna where id_reg_region = '".$region."'");
    //$dtype = "ss";
    //$query->bind_param($dtype,$data['usr'], $data['pss']);
    $query->execute();
    //$query->bind_result($rs);
    //$query->fetch();
    $rs = $query->get_result();
    //$respuesta = '';
    while($row = mysqli_fetch_array($rs)){//en el while por cada vuelta del ciclo se hace un array push, esto para concatenar
        //los resultados
        array_push($respuesta, $row);
    }
    return $respuesta;//devuelves el arreglo
}

    public function getregion(){
        $sql = 'SELECT * from region order by orden';
        $conn = $this->db->connect();
        try{
            $resp = '';
            $rs = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($rs)){
                $resp = "<option value='".$row['id_reg']."'> ".utf8_encode($row['descripcion'])."</option>";
                echo $resp;
            }
            return $resp;
            

        }catch(PDOException $e){

        }
    }


}
?>