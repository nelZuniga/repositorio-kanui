<?php
class listacomunaregion extends Controller{

    function __construct()
    {
       parent::__construct();
    }
    
    function render(){
        $id_reg_region = $_GET['id_reg_region']; 
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        $tipos = $this->model->cargacomunaregion($id_reg_region);//los importas desde la funcion
        $this->view->comunaregion = $tipos;//creas una variable con la cual podras acceder en la vista
        $this->view->render('listacomunaregion/listacomunaregion');//cargas la vista
    }

    function getRegion(){
        $respuesta = $this->model->getregion();
        return $respuesta;
    }


}
?>