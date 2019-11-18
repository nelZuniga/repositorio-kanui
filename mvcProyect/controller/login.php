<?php
class Login extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    function render(){
        $this->view->render('login/login');
    }

    function iniciarsession($int){
        $this->model->startsesion($int);
    }

    function Login(){
        $usr = $_POST['usr'];
        $pss = $_POST['pss'];
        $pss = base64_encode($pss);
        $seg = ['usuario'=> $usr, 'pass'=>$pss];
        $respuesta = $this->model->verf($seg);
        if(is_null($respuesta)){
            $respuesta = 0;
        }else{
            $this->iniciarsession($respuesta);
        }
        echo $respuesta;
    }

    

}


?>