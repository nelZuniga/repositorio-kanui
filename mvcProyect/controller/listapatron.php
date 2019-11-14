<?php
class listapatron extends Controller{

    function __construct()
    {
       parent::__construct();
    }
    
    function render(){
        $patron = [];//aqui creas un arreglo donde puedes guardar los datos
        $patron = $this->model->cargapatron();//los importas desde la funcion
        $this->view->tipopatron = $patron;//creas una variable con la cual podras acceder en la vista
        $this->view->render('listapatron/listapatron');//cargas la vista
    }

}
?>