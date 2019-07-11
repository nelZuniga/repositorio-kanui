<?php
class RegistroMascotas extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        $this->view->render('registromascotas/registromascotas');
    }
    function registraMascota(){
        //echo "usuario creado exitosamente";
        $chipM = $_POST['chipId'];
        $rutDueno = $_POST['rutDueno'];
        $nombreM = $_POST['nombreM'];
        $fechaNacM = $_POST['fechaNacM'] ;
        $Raza = $_POST['Raza'];
        $mascota = $_POST['mascota'];
        $sexoM = $_POST['sexoM'];
        $masc = ['id_mascot'=>$chipM, 'id_propietario'=> $nombreM, 'fecha_nac' =>$fechaNacM, 'raza'=>$Raza, 'tipo_mascota'=>$mascota, 'sexo'=>$sexoM];
        
        
        $retorno = $this->model->insert($masc);
        //echo $retorno;
        if($retorno){
            echo '<script>alert("Mascota Registrada");</script>';
            $this->render();
        }
        $this->render();
        
    }

    function registrar(){
        echo "Registra mascotas";
        $this->model->selec();
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