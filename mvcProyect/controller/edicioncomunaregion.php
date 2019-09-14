<?php
class edicioncomunaregion extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        $this->view->render('edicioncomunaregion/edicioncomunaregion');
    }

    function edicioncomunaregion(){
        $id_com = $_GET['id_com']; 
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        $tipos = $this->model->cargacomunaregion($id_com);//los importas desde la funcion
        $this->view->comunaregion = $tipos;//creas una variable con la cual podras acceder en la vista
        $this->view->render('edicioncomunaregion/edicioncomunaregion');//cargas la vista
    }

    function guardacomunaregion(){
        $id_com = $_POST['id_com'];
        $descripcion = $_POST['txt_desc'];
        $id_reg = $_POST['id_reg'];
        $id_reg_region = $_POST['id_reg'];
        $tipos = $this->model->guardacomunaregion($id_com,$descripcion,$id_reg);//los importas desde la funcion
        //$this->view->render('listatipomascota/listatipomascota');//cargas la vista
        
        //PARCHE CURITA
        $url = "";
echo "<script>window.location.href='".constant('URL')."listacomunaregion?id_reg_region=".$id_reg_region."';</script>";

//echo "<script>window.location.href='".constant('URL')."listacomunaregion';</script>";

        //PARCHE CURITA

    }

        function getRegion(){
        $respuesta = $this->model->getregion();
        return $respuesta;
    }

}


?>