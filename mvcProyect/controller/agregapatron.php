<?php
class agregapatron extends Controller{

    function __construct()
    {
        parent::__construct();
    }
    
    function render(){
        $this->view->render('agregapatron/agregapatron');
    }

    function agregapatron(){
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        $tipos = $this->model->cargapatron();//los importas desde la funcion
        $this->view->render('agregapatron/agregapatron');//cargas la vista
    }

    function guardapatron(){
        $descripcion = $_POST['txt_desc'];
        $tipos = $this->model->guardapatron($descripcion);//los importas desde la funcion
        //$this->view->render('listatipomascota/listatipomascota');//cargas la vista
        
        //PARCHE CURITA
        $url = "";
        echo "<script>window.location.href='".constant('URL')."listapatron';</script>";

        //PARCHE CURITA

    }    

}


?>