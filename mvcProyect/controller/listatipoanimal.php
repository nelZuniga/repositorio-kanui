<?php
class listatipoanimal extends Controller{

    function __construct()
    {
       parent::__construct();
    }
    
    function render(){
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        $tipos = $this->model->cargatipoanimal();//los importas desde la funcion
        $this->view->tipoanimal = $tipos;//creas una variable con la cual podras acceder en la vista
        $this->view->render('listatipoanimal/listatipoanimal');//cargas la vista
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