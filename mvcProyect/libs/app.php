<?php

require_once'controller/errores.php';

class App{
    function __construct(){

        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url,'/');
        $url = explode('/',$url);

        //cuando se ingresa sin definir controlador
        if(empty($url[0])){
            $archivoController = 'controller/main.php';
            require_once($archivoController);
            $controller = new main();
            $controller-> loadModel('main');
            $controller-> render();
            return false;
        }

            $archivoController = 'controller/' . $url[0]. '.php';
            //var_dump($archivoController);
            if(file_exists($archivoController)){
                require_once($archivoController);
                //inicializacion de controlador
                $controller = new $url[0];
                $controller-> loadModel($url[0]);

                //si hay un metodo que se requiere cargar
                if(isset($url[1])){
                    $controller -> {$url[1]}();
                }else{
                    $controller->render();
                }
            }else{
                $controller = new Errores();
            }
    }
}




?>