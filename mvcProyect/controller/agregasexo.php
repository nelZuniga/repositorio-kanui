<?php
class agregasexo extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        $this->view->render('agregasexo/agregasexo');
    }

    function agregasexo(){
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        $tipos = $this->model->cargasexo();//los importas desde la funcion
        $this->view->render('agregasexo/agregasexo');//cargas la vista
    }

    function guardasexo(){
        $descripcion = $_POST['txt_desc'];
        $tipos = $this->model->guardasexo($descripcion);//los importas desde la funcion
        //$this->view->render('listatipomascota/listatipomascota');//cargas la vista
        
        //PARCHE CURITA
        $url = "";
        echo "<script>window.location.href='".constant('URL')."listasexo';</script>";

        //PARCHE CURITA

    }    

}

?>