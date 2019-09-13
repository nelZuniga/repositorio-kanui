<?php
class edicionsexo extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        $this->view->render('edicionsexo/edicionsexo');
    }

    function edicionsexo(){
        $id_sex = $_GET['id_sex']; 
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        $tipos = $this->model->cargasexo($id_sex);//los importas desde la funcion
        $this->view->sexo= $tipos;//creas una variable con la cual podras acceder en la vista
        $this->view->render('edicionsexo/edicionsexo');//cargas la vista
    }

    function guardasexo(){
        $id_sex = $_POST['id_sex'];
        $descripcion = $_POST['txt_desc'];
        $tipos = $this->model->guardasexo($id_sex,$descripcion);//los importas desde la funcion
        //$this->view->render('listatipomascota/listatipomascota');//cargas la vista
        
        //PARCHE CURITA
        $url = "";
        echo "<script>window.location.href='".constant('URL')."listasexo';</script>";

        //PARCHE CURITA

    }    

}


?>