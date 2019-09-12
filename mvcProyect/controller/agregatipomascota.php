<?php
class agregatipomascota extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        $this->view->render('agregatipomascota/agregatipomascota');
    }

    function agregatiposmascota(){
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        $tipos = $this->model->cargatipomascota();//los importas desde la funcion
        $this->view->render('agregatipomascota/agregatipomascota');//cargas la vista
    }

    function guardatipomascota(){
        $descripcion = $_POST['txt_desc'];
        $tipos = $this->model->guardatipomascota($descripcion);//los importas desde la funcion
        //$this->view->render('listatipomascota/listatipomascota');//cargas la vista
        
        //PARCHE CURITA
        $url = "";
        echo "<script>window.location.href='".constant('URL')."listatipomascota';</script>";

        //PARCHE CURITA

    }    

    function select(){
        $respuesta = $this->model->cargatipomascota();
        //var_dump($respuesta);
    }

}


?>