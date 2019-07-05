<?php

class Ajax extends Controller{

    function __construct(){
        $url = constant('URL');
        require_once($url.'models/registroUsuariomodel');
        parent::__construct();;
    }

    function getRegion(){
        $regiones = $this->model->getregion();
        return $regiones;
    }

}



?>