<?php
class RegistroMascotas extends Controller{

    function __construct()
    {
        parent::__construct();
        $this->view->render('registromascotas/registromascotas');
        //echo 'controller main';
    }

    function saludo(){

        //echo "ahora si saludo";
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