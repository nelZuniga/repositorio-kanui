<?php
class ediciontipomascota extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        $this->view->render('ediciontipomascota/ediciontipomascota');
    }

    function ediciontipomascota(){
        $id_tmasc = $_GET['id_tmasc']; 
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        $tipos = $this->model->cargatipomascota($id_tmasc);//los importas desde la funcion
        $this->view->tipomascota = $tipos;//creas una variable con la cual podras acceder en la vista
        $this->view->render('ediciontipomascota/ediciontipomascota');//cargas la vista

    }

    function guardatipomascota(){
        $id_tmasc = $_POST['id_tmasc'];
        $descripcion = $_POST['txt_desc'];
        $tipos = $this->model->guardatipomascota($id_tmasc,$descripcion);//los importas desde la funcion
        $this->view->render('listatipomascota/listatipomascota');//cargas la vista

    }    


    function select(){
        $respuesta = $this->model->cargatipomascota();
        //var_dump($respuesta);
    }

}


?>