<?php
class edicionvacuna extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        $this->view->render('edicionvacuna/index');
    }

    function edicionvacuna(){
        $id_vac = $_GET['id_vac']; 
        $vacunas = [];
        $vacunas = $this->model->cargavacuna($id_vac);
        $this->view->vacunas = $vacunas;
        $this->view->render('edicionvacuna/index');
    }

    function guardavacuna(){
        $id_vac = $_POST['id_vac'];
        $descripcion = $_POST['desc'];
        $tipos = $this->model->edicionvacuna($id_vac,$descripcion);    
        //PARCHE CURITA
        $url = "";
        echo "<script>window.location.href='".constant('URL')."listatipovacuna';</script>";

        //PARCHE CURITA

    }    

}
?>