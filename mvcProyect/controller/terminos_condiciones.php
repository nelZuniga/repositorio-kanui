<?php

class terminos_condiciones extends Controller{

    function __construct(){

        parent::__construct();
        
    }

    function render(){
        $this->view->render('terminos/terminos_condiciones');
    }

}




?>