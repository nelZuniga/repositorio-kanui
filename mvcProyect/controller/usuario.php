<?php
class usuario extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        $this->view->render('usuario/usuario');
    }

    function getRegion(){
        $respuesta = $this->model->getregion();
        return $respuesta;
    }    

    function getComuna(){
        $reg = $_POST['region'];
        //echo $reg;
        $respuesta = $this->model->getcomuna($reg);
        return $respuesta;
    }    
}
?>