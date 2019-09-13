<?php
class edicionregion extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        $this->view->render('edicionregion/edicionregion');
    }

    function edicionregion(){
        $id_reg = $_GET['id_reg']; 
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        $tipos = $this->model->cargaregion($id_reg);//los importas desde la funcion
        $this->view->region = $tipos;//creas una variable con la cual podras acceder en la vista
        $this->view->render('edicionregion/edicionregion');//cargas la vista
    }

    function guardaregion(){
        $id_reg = $_POST['id_reg'];
        $descripcion = $_POST['txt_desc'];
        $simbolo = $_POST['txt_simbolo'];
        $orden = $_POST['txt_orden'];
        $tipos = $this->model->guardaregion($id_reg,$descripcion,$simbolo,$orden);//los importas desde la funcion
        //$this->view->render('listatipomascota/listatipomascota');//cargas la vista
        
        //PARCHE CURITA
        $url = "";
        echo "<script>window.location.href='".constant('URL')."listaregion';</script>";

        //PARCHE CURITA

    }    

}


?>