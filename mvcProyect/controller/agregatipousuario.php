<?php
class agregatipousuario extends Controller{

    function __construct()
    {
        parent::__construct();
    }
    
    function render(){
        $this->view->render('agregatipousuario/agregatipousuario');
    }

    function agregatipousuario(){
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        $tipos = $this->model->cargatipousuario();//los importas desde la funcion
        $this->view->render('agregatipousuario/agregatipousuario');//cargas la vista
    }

    function guardatipousuario(){
        $descripcion = $_POST['txt_desc'];
        $tipos = $this->model->guardatipousuario($descripcion);//los importas desde la funcion
        //$this->view->render('listatipomascota/listatipomascota');//cargas la vista
        
        //PARCHE CURITA
        $url = "";
        echo "<script>window.location.href='".constant('URL')."listatipousuario';</script>";

        //PARCHE CURITA

    }    

}


?>