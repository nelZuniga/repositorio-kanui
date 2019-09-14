<?php
class listaraza extends Controller{

    function __construct()
    {
       parent::__construct();
    }
    
    function render(){
        $tipoRaza = $_GET['id_tmasc']; 
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        $tipos = $this->model->cargaraza($tipoRaza);//los importas desde la funcion
        $this->view->tiporaza = $tipos;//creas una variable con la cual podras acceder en la vista
        $this->view->render('listaraza/listaraza');//cargas la vista
    }

    function getAnimal(){
        $respuesta = $this->model->getanimal();
        return $respuesta;
    }


}
?>