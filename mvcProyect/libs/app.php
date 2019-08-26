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
                //numero de lementos de un arreglo por get
                $nparam = sizeof($url);
                if($nparam > 1){
                    if($nparam > 2){
                        $param = [];
                        for($i = 2; $i<$nparam; $i++){
                            array_push($param, $url[$i]);
                        }
                        $controller -> {$url[1]}($param);
                    }else{
                        $controller -> {$url[1]}();
                    }
                }else{
                    $controller->render();
                }
                
            }else{
                $controller = new Errores();
            }
    }
}




?>