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
    function log(){
        $usr = $_GET['usr'];
        $pss = $_GET['pss'];
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

}




?>