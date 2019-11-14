<?php
class edicionpatron extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        $this->view->render('edicionpatron/edicionpatron');
    }

    function edicionpatron(){
        $id_patron = $_GET['id_patron']; 
        $patron = [];//aqui creas un arreglo donde puedes guardar los datos
        $patron = $this->model->cargapatron($id_patron);//los importas desde la funcion
        $this->view->tipopatron = $patron;//creas una variable con la cual podras acceder en la vista
        $this->view->render('edicionpatron/edicionpatron');//cargas la vista
    }

    function guardapatron(){
        $id_patron = $_POST['id_patron'];
        $descripcion = $_POST['txt_desc'];
        $tipos = $this->model->guardapatron($id_patron,$descripcion);//los importas desde la funcion
        //$this->view->render('listatipomascota/listatipomascota');//cargas la vista
        
        //PARCHE CURITA
        $url = "";
        echo "<script>window.location.href='".constant('URL')."listapatron';</script>";

        //PARCHE CURITA

    }    

}


?>