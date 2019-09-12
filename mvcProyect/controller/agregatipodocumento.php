<?php
class agregatipodocumento extends Controller{

    function __construct()
    {
        parent::__construct();
    }
    
    function render(){
        $this->view->render('agregatipodocumento/agregatipodocumento');
    }

    function agregatipodocumento(){
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        $tipos = $this->model->cargatipodocumento();//los importas desde la funcion
        $this->view->render('agregatipodocumento/agregatipodocumento');//cargas la vista
    }

    function guardatipodocumento(){
        $descripcion = $_POST['txt_desc'];
        $abreviatura = $_POST['txt_abre'];
        $tipos = $this->model->guardatipodocumento($descripcion,$abreviatura);//los importas desde la funcion
        //$this->view->render('listatipomascota/listatipomascota');//cargas la vista
        
        //PARCHE CURITA
        $url = "";
        echo "<script>window.location.href='".constant('URL')."listatipodocumento';</script>";

        //PARCHE CURITA

    }    

}


?>