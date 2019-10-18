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
        $mascota = $_POST['mascota'];
        $sexoM = $_POST['sexoM'];
        $raza_id = $_POST['raza_id'];        
        $fechaNacM = $_POST['fechaNacM'] ;
        $observacionM = $_POST['observacionM'];
        if(isset($_POST['baseimg'])){
            $img = $_POST['baseimg'];
        }else{
            $img = '';
        }
        if(isset($_POST['observacionM'])){
            $obs = $_POST['observacionM'];
        }else{
            $obs = '';
        }
        
        $mascota = ['n_chip'=>$chipM, 
                    'id_propietario'=>$rutDueno, 
                    'nombre'=>$nombreM, 
                    'tipo_mascota'=>$mascota, 
                    'sexo'=>$sexoM, 
                    'raza'=>$raza_id, 
                    'fecha_nac'=>$fechaNacM, 
                    'observaciones'=>$observacionM, 
                    'img'=>$img];
        
        $retorno = $this->model->insert($mascota);
           echo $retorno;
        if($retorno){
            echo '<script>alert("Mascota Registrada");</script>';
            $this->render();
        }else{
            $this->render();
        }
        
        
    }
    function getRaza(){
        $tipo = $_POST['tipo']; 
        $respuesta = $this->model->getraza($tipo);
        return $respuesta;
    }

    function getDatosduenio(){
        $funcion =$_POST['funcion'];
        switch($funcion){
            case 1;
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $usuario = ['nombre'=>$nombre, 'apellido'=>$apellido];
            $respuesta = $this->model->getUserNom($usuario);
            ;break;
            case 2:
            $documento = $_POST['documento'];
            $usuario = ['documento'=>$documento];
            $respuesta = $this->model->getuserDoc($usuario);
            return $respuesta;
            ;break;
        }
        
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