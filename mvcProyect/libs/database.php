<?php 

class Database{

    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;
    private $port;

    public function __construct(){
        $this->host = constant('HOST');
        $this->db = constant('DB');
        $this->user = constant('USER');
        $this->password = constant('PASSWORD');
        $this->charset = constant('CHARSET');
        $this->port = constant('PORT');

    }

    function connect(){
        try{
            /*$connection = "mysql:host=". $this->host . ";port=".$this->port.";dbname=".$this->db.";charset=".$this->charset;

            $options = [
                PDO::ATTR_ERRMODE           =>PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES  => false,
            ];

            $pdo = new PDO($connection,$this->user, $this->password, $options);*/
            $conexion = new mysqli ('zerodev.cl','cze45021','ULZ@tCO3tTc(MwI','cze45021_kanui');
            if($conexion -> connect_error){
                echo 'seProdujo un error al intentar la conexion';
            }else{
                //echo 'se conecto';
            }
            return $conexion;
            
        }catch(PDOException $e){
            print_r('ERROR Connection'.$e->getMessage());

        }
    }
}


?>