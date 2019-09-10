<?php
class ediciontipoMascota extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        $id_tmasc = $_GET['id_tmasc'];
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        //$tipos = $this->model->cargatipomascota($id_tmasc);//los importas desde la funcion
        $this->view->tipomascota = $respuesta;//creas una variable con la cual podras acceder en la vista
        $this->view->render('ediciontipomascota/ediciontipomascota');
    }

    function ediciontipomascota(){
        $tipo = $_GET['id_tmasc']; 
        $respuesta = $this->model->cargatipomascota($tipo);
        return $respuesta;
        $this->view->render('ediciontipomascota/ediciontipomascota');
    }


    function select(){
        $respuesta = $this->model->cargatipomascota();
        //var_dump($respuesta);
    }

}


?>