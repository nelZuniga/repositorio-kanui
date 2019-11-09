<?php
class registroUsuario extends Controller{

    function __construct()
    {
        parent::__construct();
        //echo 'controller main';
    }
    
    public function render(){
        $this->view->render('registrodatosusuario/RegistroDatosUsuario');
    }

    function nuevoUsuario(){
        //echo "usuario creado exitosamente";
        $nombre = $_POST['Dnombres'];
        $apellidoP = $_POST['DapellidoP'];
        $apellidoM = $_POST['DapellidoM'];
        $rut = $_POST['Drut'] ;
        $telefono = $_POST['Dtelefono'];
        $direccion = $_POST['Ddireccion'];
        $ciudad = $_POST['Vciudad'];
        $region = $_POST['region_id'];
        $comuna = $_POST['comuna_id'];
        $contraseña = $_POST['pass'];
        $correo = $_POST['correo'];
        $tipousr = $_POST['tusr'];
        $rol = $_POST['rol_id'];
        $chkTC = $_POST['chkTC'];
        $usuario = ['nombre'=>$nombre, 'apellidop'=>$apellidoP, 'apellidom'=>$apellidoM, 'rut'=>$rut, 'tusr'=> $tipousr, 'direccion'=>$direccion, 'comuna'=>$comuna, 'correo' =>$correo, 'telefono'=>$telefono,'ciudad'=>$ciudad, 'region'=>$region, 'contraseña'=>$contraseña,'rol'=>$rol,'chkTC'=>$chkTC];
        $retorno = $this->model->insert($usuario);
        if($retorno){
            echo '<script>alert("Usuario Creado con Éxito");</script>';
            $this->render();
        }else{
            $this->render();
        }
        
        
    }

    function getDetalleUsuario(){
        $id_usr = $_POST['id'];
        $retorno = $this->model->getDataUser($id_usr);
        return $retorno;
    }

    function getRegion(){
        $respuesta = $this->model->getregion();
        return $respuesta;
    }

    function getComuna(){
        $reg = $_POST['region'];
        //echo $reg;
        $respuesta = $this->model->getcomuna($reg);
        return $respuesta;
    }

    function getRol(){
        $respuesta = $this->model->getrol();
        return $respuesta;
    }
    

    function checkCorreo(){
        $correo = $_POST['mail'];
        $respuesta = $this->model->checkCorreo($correo);
        return $respuesta;
    }

    function actualizaUsuario(){
        $tipousr = $_POST['rol_id'];
        $id_usr = $_POST['id_usr'];
        $nombres = $_POST['Dnombres'];
        $apellidoP = $_POST['DapellidoP'];
        $apellidoM = $_POST['DapellidoM'];
        $rut = $_POST['Drut'];
        $correo = $_POST['correo'];
        $telefono = $_POST['Dtelefono'];
        $direccion = $_POST['Ddireccion'];
        $ciudad = $_POST['Vciudad'];
        $comuna = $_POST['comuna_id'];
        $usuario = ['tipo_usr' => $tipousr,'id_usr'=> $id_usr,'nombres'=>$nombres,'apellidoP'=>$apellidoP,'apellidoM'=>$apellidoM,'rut'=>$rut,'correo'=>$correo,'telefono'=>$telefono,'direccion'=>$direccion,'comuna'=>$comuna];
        $retorno = $this->model->updateUsr($usuario);
        if($retorno){
            echo '<script>alert("Usuario Actualizado con Éxito");</script>';
            header("location:".constant('URL').edicionusuario."");
        }else{
            $this->render();
        }
    }
}


?>