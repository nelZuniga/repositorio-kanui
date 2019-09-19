<?php
class Listatipovacuna extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        
        $vacunas = [];//aqui creas un arreglo donde puedes guardar los datos
        $vacunas = $this->model->cargavacunas();//los importas desde la funcion
        $this->view->vacunas = $vacunas;//creas una variable con la cual podras acceder en la vista
        $this->view->render('listatipovacuna/index');
    }
}
?>