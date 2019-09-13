<?php
class listatipousuario extends Controller{

    function __construct()
    {
       parent::__construct();
    }
    
    function render(){
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        $tipos = $this->model->cargatipousuario();//los importas desde la funcion
        $this->view->tipousuario = $tipos;//creas una variable con la cual podras acceder en la vista
        $this->view->render('listatipousuario/listatipousuario');//cargas la vista
    }

}
?>