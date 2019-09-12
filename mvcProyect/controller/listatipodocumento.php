<?php
class listatipodocumento extends Controller{

    function __construct()
    {
       parent::__construct();
    }
    
    function render(){
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        $tipos = $this->model->cargatipodocumento();//los importas desde la funcion
        $this->view->tipodocumento = $tipos;//creas una variable con la cual podras acceder en la vista
        $this->view->render('listatipodocumento/listatipodocumento');//cargas la vista
    }

// registro mascotas insert
// edita mascotas update
// apimodel select    

}
?>