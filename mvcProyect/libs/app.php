<?php

require_once'controller/errores.php';

class App{
    function __construct(){

        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url,'/');
        $url = explode('/',$url);


        if(empty($url[0])){
            $archivoController = 'controller/main.php';
            require_once($archivoController);
            $controller = new main();
            return false;
        }

            $archivoController = 'controller/' . $url[0]. '.php';
            //var_dump($archivoController);
            if(file_exists($archivoController)){
                require_once($archivoController);
                $controller = new $url[0];
                if(isset($url[1])){
                    $controller -> {$url[1]}();
                }
            }else{
                $controller = new Errores();
            }
    }
}




?>