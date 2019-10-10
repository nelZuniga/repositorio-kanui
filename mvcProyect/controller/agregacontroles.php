<?php
class agregacontroles extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        $this->view->render('agregacontroles/agregacontroles');
    }

    function agregacontrol(){
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        $tipos = $this->model->cargasexo();//los importas desde la funcion
        $this->view->render('agregacontroles/agregacontroles');//cargas la vista
    }

    function guardacontrol(){
        $descripcion = $_POST['txt_desc'];
        $tipos = $this->model->guardacontrol($descripcion);//los importas desde la funcion
        //$this->view->render('listatipomascota/listatipomascota');//cargas la vista
        
        //PARCHE CURITA
        $url = "";
        echo "<script>window.location.href='".constant('URL')."listacontroles';</script>";

        //PARCHE CURITA

    }    

}

?>