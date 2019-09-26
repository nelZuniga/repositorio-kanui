<?php
class agregaraza extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        $this->view->render('agregaraza/agregaraza');
    }

    function guardaraza(){
        $descripcion = $_POST['txt_desc'];
        $mascota = $_POST['id_tmasc'];
        $tipos = $this->model->guardaraza($descripcion,$mascota);//los importas desde la funcion
        //$this->view->render('listatipomascota/listatipomascota');//cargas la vista
        
        //PARCHE CURITA
        $url = "";
        echo "<script>window.location.href='".constant('URL')."listaraza?id_tmasc=".$mascota."';</script>";

        //PARCHE CURITA

    }    

}

?>