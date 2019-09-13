<?php
class ediciontipousuario extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        $this->view->render('ediciontipousuario/ediciontipousuario');
    }

    function ediciontipousuario(){
        $id_tusr = $_GET['id_tusr']; 
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        $tipos = $this->model->cargatipousuario($id_tusr);//los importas desde la funcion
        $this->view->tipousuario = $tipos;//creas una variable con la cual podras acceder en la vista
        $this->view->render('ediciontipousuario/ediciontipousuario');//cargas la vista
    }

    function guardatipousuario(){
        $id_tusr = $_POST['id_tusr'];
        $descripcion = $_POST['txt_desc'];
        $tipos = $this->model->guardatipousuario($id_tusr,$descripcion);//los importas desde la funcion
        //$this->view->render('listatipomascota/listatipomascota');//cargas la vista
        
        //PARCHE CURITA
        $url = "";
        echo "<script>window.location.href='".constant('URL')."listatipousuario';</script>";

        //PARCHE CURITA

    }    

}


?>