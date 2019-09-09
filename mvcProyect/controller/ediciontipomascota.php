<?php
class ediciontipoMascota extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        $tipos = $this->model->cargatipomascota($id_tmasc);//los importas desde la funcion
        $this->view->tipomascota = $tipos;//creas una variable con la cual podras acceder en la vista
        $this->view->render('ediciontipomascota/ediciontipomascota');
    }

    function ediciontipomascota($id_tmasc){
        $id_tmasc = $id_tmasc;
        $tipo_mascota = $this->model->cargatipomascota($id_tmasc);
        $this->view->tipo_mascota = $tipo_mascota;
        $this->view->render('ediciontipomascota/ediciontipomascota');
    }


    function select(){
        $respuesta = $this->model->cargatipomascota();
        //var_dump($respuesta);
    }

}


?>