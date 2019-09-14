<?php
class listacomuna extends Controller{

    function __construct()
    {
       parent::__construct();
    }
    
    function render(){
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        $tipos = $this->model->cargacomuna();//los importas desde la funcion
        $this->view->comuna = $tipos;//creas una variable con la cual podras acceder en la vista
        $this->view->render('listacomuna/listacomuna');//cargas la vista
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