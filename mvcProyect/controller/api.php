<?php

class api extends Controller{

    function __construct(){

        parent::__construct();
        
    }

    function render(){
        $this->view->render('api/api');
    }

    function log(){
        $usr = $_GET['usr'];
        $pss = $_GET['pss'];
        $log = ['usr'=>$usr,'pss'=>$pss];
        $rest = $this->model->login($log);
        
    }

    function getdata(){
        $usr = $_GET['id_usr'];
        $log = ['usr'=>$usr];
        $rest = $this->model->getdata($log);
    }

    function getpet(){
        $usr = $_GET['id_usr'];
        $chip = $_GET['nro'];
        $log = ['usr'=>$usr,'chip'=>$chip];
        $rest = $this->model->getpet($log);
    }

}




?>