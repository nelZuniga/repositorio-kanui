<?php
class registroUsuario extends Controller{

    function __construct()
    {
        parent::__construct();
        $this->view->render('registrodatosusuario/RegistroDatosUsuario');
        //echo 'controller main';
    }

    function nuevoUsuario(){
        echo "usuario creado exitosamente";
        $this->model->insert();
    }

    //OJO AQUI como crear insercion de datos

    function getdata(){
        //nombre tentativo

        /* en un formulario se agrega e la url de la action (url+/nombre de la funcion)
        en este caso seria "url/getdata"  en get data obtenemos todos los datos de $_POST
        y los ordenamos en un array, luego para invocar la funcion del modelo es 
        
        $this->model-> (Nombre de la funcion del modelo) y se entregan los datos por el parametro*/
    }
}


?>