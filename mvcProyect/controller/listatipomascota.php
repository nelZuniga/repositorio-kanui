<?php
class listatipomascota extends Controller{

    function __construct()
    {
       parent::__construct();
    }
    
    function render(){
        $this->view->render('listatipomascota/listatipomascota');
    }

    function select(){
        $respuesta = $this->model->cargatipomascota();
        var_dump($respuesta);
    }

    function guardar(){
        $texto = $_POST['texto'];
        //echo $texto;
        $envio = ["nombre"=>$texto];
        $this->model->poner($envio);
    }

// registro mascotas insert
// edita mascotas update
// apimodel select    

}
?>