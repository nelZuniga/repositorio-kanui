<?php
class edicionraza extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        $this->view->render('edicionraza/edicionraza');
    }

    function edicionraza(){
        $id_raza = $_GET['id_raza']; 
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        $tipos = $this->model->cargaraza($id_raza);//los importas desde la funcion
        $this->view->raza = $tipos;//creas una variable con la cual podras acceder en la vista
        $this->view->render('edicionraza/edicionraza');//cargas la vista
    }

    function guardaraza(){
        $id_raza = $_POST['id_raza'];
        $descripcion = $_POST['txt_desc'];
        $id_tmasc = $_POST['id_tmasc'];
        $tipoRaza = $_POST['id_tmasc'];
        $tipos = $this->model->guardaraza($id_raza,$descripcion,$id_tmasc);//los importas desde la funcion
        //$this->view->render('listatipomascota/listatipomascota');//cargas la vista
        
        //PARCHE CURITA
        $url = "";
echo "<script>window.location.href='".constant('URL')."listaraza?id_tmasc=".$id_tmasc."';</script>";

//echo "<script>window.location.href='".constant('URL')."listacomunaregion';</script>";

        //PARCHE CURITA

    }

        function getmascota(){
        $respuesta = $this->model->getmascota();
        return $respuesta;
    }

}


?>