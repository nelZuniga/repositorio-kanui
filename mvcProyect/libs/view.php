<?php

class View{

    function __construct()
    {
        //echo "vistaBase/";
    }

    function render($nombre){
        require 'views/'.$nombre.'.php';
    }
}

?>