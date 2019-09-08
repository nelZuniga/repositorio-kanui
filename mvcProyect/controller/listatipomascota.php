<?php
class listatipomascota extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        $this->view->render('listatipomascota/listatipomascota');
    }

    function select(){
        $respuesta = $this->model->select();
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