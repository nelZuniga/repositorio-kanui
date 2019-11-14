<?php
class edicioncolor extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        $this->view->render('edicioncolor/edicioncolor');
    }

    function edicioncolor(){
        $id_color = $_GET['id_color']; 
        $color = [];//aqui creas un arreglo donde puedes guardar los datos
        $color = $this->model->cargacolor($id_color);//los importas desde la funcion
        $this->view->tipocolor = $color;//creas una variable con la cual podras acceder en la vista
        $this->view->render('edicioncolor/edicioncolor');//cargas la vista
    }

    function guardacolor(){
        $id_color = $_POST['id_color'];
        $descripcion = $_POST['txt_desc'];
        $tipos = $this->model->guardacolor($id_color,$descripcion);//los importas desde la funcion
        //$this->view->render('listatipomascota/listatipomascota');//cargas la vista
        
        //PARCHE CURITA
        $url = "";
        echo "<script>window.location.href='".constant('URL')."listacolor';</script>";

        //PARCHE CURITA

    }    

}


?>