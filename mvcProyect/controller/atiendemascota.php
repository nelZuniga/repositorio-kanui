<?php
class atiendeMascota extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        $this->view->render('atiendemascota/atiendeMascota');
    }

    function atiendeMascota(){
        $idmascot = $_POST['idmascot'];
        $pesoM = $_POST['pesoM'];
        $id_vac = $_POST['id_vac'];
        $dosis = $_POST['dosis'];
        $FechaPA = $_POST['FechaPA'];
        $id_control = $_POST['id_control'];
        $observacionA = $_POST['observacionA'];
        $tipos = $this->model->atiendeMascota($idmascot,$pesoM,$id_vac,$dosis,$FechaPA,$id_control,$observacionA);
        //PARCHE CURITA
        $url = "";
        echo "<script>window.location.href='".constant('URL')."atencionmascota';</script>";

        //PARCHE CURITA

    }  


    function getmascota(){
        $tipo = $_POST['id']; 
        $respuesta = $this->model->getMascota($tipo);
        return $respuesta;
    }

    function getDatosduenio(){
        $funcion =$_POST['funcion'];
        switch($funcion){
            case 1;
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $usuario = ['nombre'=>$nombre, '$apellido'=>$apellido];
            $respuesta = $this->model->getUserNom($usuario);
            ;break;
            case 2:
            $documento = $_POST['documento'];
            $usuario = ['documento'=>$documento];
            $respuesta = $this->model->getuserDoc($usuario);
            return $respuesta;
            ;break;
        }
        
    }
}


?>