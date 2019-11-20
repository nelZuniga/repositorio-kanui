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

    function iniciarsession(){
        $int = $_POST['int'];
        $this->model->startsesion($int);
    }

    function Login(){
        $usr = $_POST['usr'];
        $pss = $_POST['pss'];
        $pss = base64_encode($pss);
        $seg = ['usuario'=> $usr, 'pass'=>$pss];
        $respuesta = $this->model->verf($seg);
        return $respuesta ;
    }

    

}


?>