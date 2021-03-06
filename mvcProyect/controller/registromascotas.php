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
    function mismascotas(){
        $this->view->render('registromascotas/registroDatosmascotasUser');
    }
    function rendeUser(){
        $this->view->render('registromascotas/mismasCotas');
    }
    function registraMascota(){
        //echo "usuario creado exitosamente";
        $chipM = $_POST['chipId'];
        $rutDueno = $_POST['id_usr'];
        $nombreM = $_POST['nombreM'];
        $mascota = $_POST['mascota'];
        $sexoM = $_POST['sexoM'];
        $raza_id = $_POST['raza_id'];
        $patron_id = $_POST['patron_id'];
        $color_id = $_POST['color_id'];
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
                    'patron'=>$patron_id, 
                    'color'=>$color_id, 
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

    function getSexo(){
        $respuesta = $this->model->getSexo();
        return $respuesta;
    }

    function getTipo(){
        $respuesta = $this->model->getTipo();
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
    function getColor(){
        $respuesta = $this->model->getColor();
        return $respuesta;
    }

    function getPatron(){
        $respuesta = $this->model->getPatron();
        return $respuesta;
    }   
    
    function getmascotas(){
        $tipo = $_POST['id']; 
        $respuesta = $this->model->getMascota($tipo);
        return $respuesta;
    }


}


?>