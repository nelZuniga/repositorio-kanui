<?php
class agregacomuna extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        $this->view->render('agregacomuna/agregacomuna');
    }

    function guardacomuna(){
        $descripcion = $_POST['txt_desc'];
        $region = $_POST['id_reg_region'];
        $tipos = $this->model->guardacomuna($descripcion,$region);//los importas desde la funcion
        //$this->view->render('listatipomascota/listatipomascota');//cargas la vista
        
        //PARCHE CURITA
        $url = "";
        echo "<script>window.location.href='".constant('URL')."listacomunaregion?id_reg_region=".$region."';</script>";

        //PARCHE CURITA

    }    

}

?>