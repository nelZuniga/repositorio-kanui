<?php
class listacontroles extends Controller{

    function __construct()
    {
       parent::__construct();
    }
    
    function render(){
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        $tipos = $this->model->cargacontrol();//los importas desde la funcion
        $this->view->control = $tipos;//creas una variable con la cual podras acceder en la vista
        $this->view->render('listacontroles/listacontroles');//cargas la vista
    }
}
?>