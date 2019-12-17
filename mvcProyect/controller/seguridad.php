<?php
class Seguridad extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }

    function render(){
        $campos = [];
        $valores = [];
        session_start();
        $campos = $this->model->getItemsMuestra();
        $valores = $this->model->getvaluesMuestra($_SESSION['id_usr']);
        $this->view->campos = $campos;
        $this->view->valores = $valores;
        $this->view->render('seguridad/seg');
    }

    function setSeg(){
        $nombre;
        $nommasc;
        $tel;
        $idusr = $_POST['id_usr'];
        if(!isset($_POST[1])){
            $nombre = 'off';
        }else{
            $nombre = $_POST[1]; 
        }
        if(!isset($_POST[2])){
            $nommasc = 'off';
        }else{
            $nommasc = $_POST[2]; 
        }
        if(!isset($_POST[3])){
            $tel = 'off';
        }else{
            $tel = $_POST[3]; 
        }
        $data = ["1"=>$nombre, "2"=>$nommasc, "3" =>$tel, "usuario" => $idusr];
        $this->model->confSeg($data);
        echo "<script> alert('datos Actualizados con Éxito');window.location.href='".constant('URL')."home';</script>";

    }

}
    ?>