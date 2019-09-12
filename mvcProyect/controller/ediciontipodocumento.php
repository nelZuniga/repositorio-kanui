<?php
class ediciontipodocumento extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        $this->view->render('ediciontipodocumento/ediciontipodocumento');
    }

    function ediciontipodocumento(){
        $id_tdoc = $_GET['id_tdoc']; 
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        $tipos = $this->model->cargatipodocumento($id_tdoc);//los importas desde la funcion
        $this->view->tipodocumento= $tipos;//creas una variable con la cual podras acceder en la vista
        $this->view->render('ediciontipodocumento/ediciontipodocumento');//cargas la vista
    }

    function guardatipodocumento(){
        $id_tdoc = $_POST['id_tdoc'];
        $descripcion = $_POST['txt_desc'];
        $abreviatura = $_POST['txt_abre'];
        $tipos = $this->model->guardatipodocumento($id_tdoc,$descripcion,$abreviatura);//los importas desde la funcion
        //$this->view->render('listatipodocumento/listatipodocumento');//cargas la vista
        
        //PARCHE CURITA
        $url = "";
        echo "<script>window.location.href='".constant('URL')."listatipodocumento';</script>";
        //PARCHE CURITA

    }    

}


?>