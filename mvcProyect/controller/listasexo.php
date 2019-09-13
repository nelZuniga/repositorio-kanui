<?php
class listasexo extends Controller{

    function __construct()
    {
       parent::__construct();
    }
    
    function render(){
        $tipos = [];//aqui creas un arreglo donde puedes guardar los datos
        $tipos = $this->model->cargasexo();//los importas desde la funcion
        $this->view->sexo = $tipos;//creas una variable con la cual podras acceder en la vista
        $this->view->render('listasexo/listasexo');//cargas la vista
    }
}
?>