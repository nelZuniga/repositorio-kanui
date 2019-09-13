<?php
class listaregion extends Controller{

    function __construct()
    {
       parent::__construct();
    }
    
    function render(){
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        $tipos = $this->model->cargaregion();//los importas desde la funcion
        $this->view->region = $tipos;//creas una variable con la cual podras acceder en la vista
        $this->view->render('listaregion/listaregion');//cargas la vista
    }

}
?>