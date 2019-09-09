<?php
class listatipomascota extends Controller{

    function __construct()
    {
       parent::__construct();
    }
    
    function render(){
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        $tipos = $this->model->cargatipomascota();//los importas desde la funcion
        $this->view->tipomascota = $tipos;//creas una variable con la cual podras acceder en la vista
        $this->view->render('listatipomascota/listatipomascota');//cargas la vista
    }

    function select(){
        $respuesta = $this->model->cargatipomascota();
        //var_dump($respuesta);
    }

// registro mascotas insert
// edita mascotas update
// apimodel select    

}
?>