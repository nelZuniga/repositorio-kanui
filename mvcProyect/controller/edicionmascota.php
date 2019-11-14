<?php
class EdicionMascota extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        $this->view->render('edicionmascota/edicionDatosmascotas');
    }

    function editarmascota($param = null){
        $idmascot = $param[0];
        $mascota = [];
        $mascota = $this->model->getEditMascota($idmascot);
        $this->view->mascota = $mascota;
        $this->view->render('edicionmascota/editamascotas');
    }
    function editaMascota(){
        //echo "usuario creado exitosamente";
        $chipM = $_POST['chipId'];
        $idmascot = $_POST['idmascot'];
        $nombreM = $_POST['nombreM'];
        $fechaNacM = $_POST['fechaNacM'] ;
        $raza = $_POST['raza_id'];
        $color = $_POST['color_id'];
        $patron = $_POST['patron_id'];
        $mascota = $_POST['mascota'];
        $sexoM = $_POST['sexoM'];
        $observaciones = $_POST['observacionM'];
        $img = $_POST['baseimg'];
        $mascota = [ 'idmascot'=>$idmascot, 'nombre'=>$nombreM,'fecha_nac' =>$fechaNacM,  'tipo_mascota'=>$mascota, 'sexo'=>$sexoM,'raza'=>$raza,'patron'=>$patron, 'color'=>$color, 'obs'=>$observaciones, 'img'=>$img];
        
        
        $retorno = $this->model->edit($mascota);
        //echo $retorno;
        if($retorno){
            echo '<script>alert("Datos de Mascota Editados Correctamente");</script>';
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
}


?>