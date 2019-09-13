<?php
class agregaregion extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        $this->view->render('agregaregion/agregaregion');
    }

    function agregaregion(){
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        $tipos = $this->model->cargaregion();//los importas desde la funcion
        $this->view->render('agregaregion/agregaregion');//cargas la vista
    }

    function guardaregion(){
        $descripcion = $_POST['txt_desc'];
        $simbolo = $_POST['txt_simbolo'];
        $orden = $_POST['txt_orden'];
        $tipos = $this->model->guardaregion($descripcion,$simbolo,$orden);//los importas desde la funcion
        //$this->view->render('listatipomascota/listatipomascota');//cargas la vista
        
        //PARCHE CURITA
        $url = "";
        echo "<script>window.location.href='".constant('URL')."listaregion';</script>";

        //PARCHE CURITA

    }    
}


?>