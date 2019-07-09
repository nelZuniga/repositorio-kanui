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
        $usuario = ['nombre'=>$nombre, 'apellidop'=> $apellidoP, 'apellidom' =>$apellidoM, 'rut'=>$rut, 'telefono'=>$telefono, 'direccion'=>$direccion,'ciudad'=>$ciudad,'region'=>$region,'comuna'=>$comuna];
        
        
        $retorno = $this->model->insert($usuario);
        //echo $retorno;
        if($retorno){
            echo '<script>alert("Usuario Creado con Éxito");</script>';
            $this->render();
        }
        $this->render();
        
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