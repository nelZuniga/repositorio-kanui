<?php

class api extends Controller{

    function __construct(){

        parent::__construct();
        
    }

    function render(){
        $this->view->render('api/api');
    }

    function comparar($llave){
        $this->key = constant('KEY');
        if($this->key === $llave){
            return true;
        }else{
            return false;
        }
    }

    function regCorreo(){
        header("Content-type: text/html; charset=UTF-8");
        //urldecode($_GET);
        $correo = $_GET['referer'];
        $log = ['correo'=>$correo,];
        $rest = $this->model->regCorreo($log);
        if($rest !== ''){
            http_response_code(200);
            echo "<script>window.location.href = '../main'; </script> ";
           // header("location:".constant('URL').main."");
        }else{
            http_response_code(500);
        }
        return $rest;
        
    }

    function log(){
        header("Content-type: text/html; charset=UTF-8");
        //urldecode($_GET);
        $usr = $_GET['usr'];
        $pss = $_GET['pss'];
        $pss = base64_encode($pss);
        $log = ['usr'=>$usr,'pss'=>$pss];
        
        $rest = $this->model->login($log);
        if($rest !== ''){
            http_response_code(200);
        }else{
            http_response_code(500);
        }
        return $rest;
        
    }

    function getdata(){
        $usr = $_GET['id_usr'];
        $log = ['usr'=>$usr];
        $rest = $this->model->getdata($log);
        if($rest !== ''){
            http_response_code(200);
        }else{
            http_response_code(500);
        }
    }

    function getpet(){
        $usr = $_GET['id_usr'];
        $chip = $_GET['nro'];
        $log = ['usr'=>$usr,'chip'=>$chip];
        $rest = $this->model->getpet($log);
        if($rest !== ''){
            http_response_code(200);
        }else{
            http_response_code(500);
        }
    }

    function getMascotas(){
        $usr = $_GET['id_usr'];
        $rest = $this->model->getmascotas($usr);
        if($rest !== ''){
            http_response_code(200);
        }else{
            http_response_code(500);
        }
    }

    function getmascotafull(){
        $masc = $_GET['id_masc'];
        $rest = $this->model->getmascotafull($masc);
        if($rest !== ''){
            http_response_code(200);
        }else{
            http_response_code(500);
        }
    }

    function updmascota(){
        $id_masc = $_GET['id_masc'];
        $nombre =$_GET['nombre'];
        $sexo =$_GET['sexo'];
        $observaciones = $_GET['observaciones'];
        //no se va a actualizar img aun
        //$img =$_GET['img'];
        $masc = ["id_masc"=>$id_masc,"nombre"=>$nombre,"sexo"=>$sexo, "obs"=>$observaciones];
        $rest = $this->model->updmascota($masc);
        if($rest !== ''){
            http_response_code(200);
        }else{
            http_response_code(500);
        }
    }

    function getcarnet(){
        $id_masc = $_GET['id_masc'];
        $rest = $this->model->getcarnet($id_masc);
    }

    function updusuario(){
        $id_usr = $_GET['id_usr'];
        $nombres = $_GET['nombres'];
        $apellidoP = $_GET['apellidop'];
        $apellidoM = $_GET['apellidom'];
        $tipodoc = $_GET['tdoc'];
        $doc = $_GET['doc'];
        $usuario = ["id_usr"=>$id_usr,"nombres"=>$nombres,"apellidop"=>$apellidoP,"apellidom"=>$apellidoM,"tdoc"=>$tipodoc,"doc"=>$doc];
        $rest = $this->model->updusuario($usuario);
        if($rest !== ''){
            http_response_code(200);
        }else{
            http_response_code(500);
        }
    }

    function updhuella(){
        $id_usr = $_GET['id_usr'];
        $huella = $_GET['huella'];
        $usuario = ["id_usr"=>$id_usr,"huella"=>$huella];
        $rest = $this->model->updhuella($usuario);
        if($rest !== ''){
            http_response_code(200);
        }else{
            http_response_code(500);
        }
    }

    function scan(){
        $id_usr = $_GET['id_usr'];
        $lat = $_GET['lat'];
        $long = $_GET['long'];
        $nchip = $_GET['nchip'];
        $scan = ["id_usr"=>$id_usr,"lat"=>$lat,"long"=>$long,"nchip"=>$nchip]; 
        $rest = $this->model->setScan($scan);

    }

    function getScans(){
        $id_usr = $_GET['id_usr'];
        $scans = ["id_usr"=>$id_usr];
        $rest = $this->model->getScans($scans);
    }

    function getScanmascota(){
        $id_mascot = $_GET['id_mascot'];
        $scans = ["id_mascot"=>$id_mascot];
        $rest = $this->model->getScanmascota($scans);
    }

    function getAtencionesMascota(){
        $id_mascot = $_GET['id_mascot'];
        $rest = $this->model->getAtenciones($id_mascot);
    }

    function getAtencionesDetalle(){
        $id_atenc = $_GET['id_atenc'];
        $rest = $this->model->getAtencionDetalle($id_atenc);
    }

}




?>