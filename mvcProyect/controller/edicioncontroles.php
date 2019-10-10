<?php
class edicioncontroles extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        $this->view->render('edicioncontroles/edicioncontroles');
    }

    function edicioncontroles(){
        $id_control = $_GET['id_control']; 
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        $tipos = $this->model->cargacontrol($id_control);//los importas desde la funcion
        $this->view->control= $tipos;//creas una variable con la cual podras acceder en la vista
        $this->view->render('edicioncontroles/edicioncontroles');//cargas la vista
    }

    function guardacontrol(){
        $id_control = $_POST['id_control'];
        $descripcion = $_POST['txt_desc'];
        $tipos = $this->model->guardacontrol($id_control,$descripcion);//los importas desde la funcion
        //$this->view->render('listatipomascota/listatipomascota');//cargas la vista
        
        //PARCHE CURITA
        $url = "";
        echo "<script>window.location.href='".constant('URL')."listacontroles';</script>";

        //PARCHE CURITA

    }    

}


?>