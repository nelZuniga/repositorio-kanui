<?php
class Scaneos extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }

    function render(){
        $this->view->render('scaneos/scaneos');
    }

    function historial($param = null){
        $this->view->render('scaneos/scaneoDetalle');
        $idmascot = $param[0];
        $mascota = [];
        $mascota = $this->model->getScansMascota($idmascot);
        $this->view->mascota = $mascota;
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