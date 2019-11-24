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

    function render_U(){
        $this->view->render('scaneos/scaneos_U');
    }


    function historial($param = null){
        $idmascot = $param[0];
        $mascota = $this->model->getScansMascota($idmascot);
        $this->view->mascota = $mascota;
        $this->view->render('scaneos/scaneoDetalle');
        
    }

    function getmascota(){
        $tipo = $_POST['id']; 
        $respuesta = $this->model->getMascota($tipo);
        return $respuesta;
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