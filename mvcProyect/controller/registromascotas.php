<?php
class RegistroMascotas extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        $this->view->render('registromascotas/registroDatosmascotas');
    }
    function registraMascota(){
        //echo "usuario creado exitosamente";
        $chipM = $_POST['chipId'];
        $rutDueno = $_POST['rutDueno'];
        $nombreM = $_POST['nombreM'];
        $fechaNacM = $_POST['fechaNacM'] ;
       // $Raza = $_POST['Raza'];
        $mascota = $_POST['mascota'];
        $sexoM = $_POST['sexoM'];
        $mascota = ['n_chip'=>$chipM, 'id_propietario'=>$rutDueno, 'nombre'=>$nombreM,'fecha_nac' =>$fechaNacM,  'tipo_mascota'=>$mascota, 'sexo'=>$sexoM];
        
        
        $retorno = $this->model->insert($mascota);
        //echo $retorno;
        if($retorno){
            echo '<script>alert("Mascota Registrada");</script>';
            $this->render();
        }
        $this->render();
        
    }
    function getRaza(){
        $tipo = $_POST['tipo']; 
        $respuesta = $this->model->getraza($tipo);
        return $respuesta;
    }

   // function registrar(){
     //   echo "Registra mascotas";
       // $this->model->selec();
    //}

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