<?php
class historialmascota extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        $this->view->render('historialmascota/historialmascota');
    }

    function controlesmascota($param = null){
        $idmascot = $param[0];
        $historial = [];
        $historial = $this->model->getHistorialMascota($idmascot);
        $this->view->historial = $historial;
        $this->view->render('historialmascota/controlesmascota');
    }

    function certificadomascota($param = null){
        $idmascot = $param[0];
        $historial = [];
        $historial = $this->model->getCertificado($idmascot);
        $this->view->historial = $historial;
        $this->view->render('historialmascota/certificadomascota');
    }

    function editaMascota(){
        //echo "usuario creado exitosamente";
        $chipM = $_POST['chipId'];
        $idmascot = $_POST['idmascot'];
        $nombreM = $_POST['nombreM'];
        $fechaNacM = $_POST['fechaNacM'] ;
        $raza = $_POST['raza_id'];
        $mascota = $_POST['mascota'];
        $sexoM = $_POST['sexoM'];
        $observaciones = $_POST['observacionM'];
        $img = $_POST['baseimg'];
        $mascota = [ 'idmascot'=>$idmascot, 'nombre'=>$nombreM,'fecha_nac' =>$fechaNacM,  'tipo_mascota'=>$mascota, 'sexo'=>$sexoM,'raza'=>$raza, 'obs'=>$observaciones, 'img'=>$img];
        
        
        $retorno = $this->model->edit($mascota);
        //echo $retorno;
        if($retorno){
            echo '<script>alert("Mascota Registrada");</script>';
            $this->render();
        }else{
            $this->render();
        }
    }

    function getmascota(){
        $tipo = $_POST['id']; 
        $respuesta = $this->model->getMascota($tipo);
        return $respuesta;
    }

    function getDatosduenio(){
        $funcion =$_POST['funcion'];
        switch($funcion){
            case 1;
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $usuario = ['nombre'=>$nombre, '$apellido'=>$apellido];
            var_dump($nombre);
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

    function getVacunas(){
        $respuesta = $this->model->getVacunas();
        return $respuesta;
    }

    function getControles(){
        $respuesta = $this->model->getControles();
        return $respuesta;
    }    

    function getCertificado($param = null){
        $idmascot = $param[0];
        $historial = [];
        $historial = $this->model->getCertificado($idmascot);
        $this->view->historial = $historial;
        $this->view->render('historialmascota/certificadomascota');
    }  

}


?>