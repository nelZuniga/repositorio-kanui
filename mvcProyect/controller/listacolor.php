<?php
class listacolor extends Controller{

    function __construct()
    {
       parent::__construct();
    }
    
    function render(){
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        $tipos = $this->model->cargacolor();//los importas desde la funcion
        $this->view->color = $color;//creas una variable con la cual podras acceder en la vista
        $this->view->render('listacolor/listacolor');//cargas la vista
    }

}
?>