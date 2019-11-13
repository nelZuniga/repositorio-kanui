<?php
class agregacolor extends Controller{

    function __construct()
    {
        parent::__construct();
    }
    
    function render(){
        $this->view->render('agregacolor/agregacolor');
    }

    function agregacolor(){
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        $tipos = $this->model->cargacolor();//los importas desde la funcion
        $this->view->render('agregacolor/agregacolor');//cargas la vista
    }

    function guardacolor(){
        $descripcion = $_POST['txt_desc'];
        $tipos = $this->model->guardacolor($descripcion);//los importas desde la funcion
        //$this->view->render('listatipomascota/listatipomascota');//cargas la vista
        
        //PARCHE CURITA
        $url = "";
        echo "<script>window.location.href='".constant('URL')."listacolor';</script>";

        //PARCHE CURITA

    }    

}


?>