<?php
use PHPMailer\PHPMailer\PHPMailer;
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
        $contraseña = base64_encode($contraseña);
        $correo = $_POST['correo'];
        $tipousr = $_POST['tusr'];
        $rol = $_POST['rol_id'];
        $chkTC = $_POST['chkTC'];
        $usuario = ['nombre'=>$nombre, 'apellidop'=>$apellidoP, 'apellidom'=>$apellidoM, 'rut'=>$rut, 'tusr'=> $tipousr, 'direccion'=>$direccion, 'comuna'=>$comuna, 'correo' =>$correo, 'telefono'=>$telefono,'ciudad'=>$ciudad, 'region'=>$region, 'contraseña'=>$contraseña,'rol'=>$rol,'chkTC'=>$chkTC];
        $retorno = $this->model->insert($usuario);
        if($retorno){
            $resp = $this->correo($correo);
            echo '<script>alert("Se ha creado usuario Exitosamente, se ha enviado un correo de confirmación");</script>';
            //$this->render();
        }else{
            //$this->render();
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
        //$tipousr = $_POST['rol_id'];
        $id_usr = $_POST['id_usr'];
        $nombres = $_POST['Dnombres'];
        $apellidoP = $_POST['DapellidoP'];
        $apellidoM = $_POST['DapellidoM'];
        $rut = $_POST['Drut'];
        $tipo_usr = $_POST['tipo_usr'];
        $correo = $_POST['correo'];
        $telefono = $_POST['Dtelefono'];
        $direccion = $_POST['Ddireccion'];
        //$ciudad = $_POST['Vciudad'];
        $comuna = $_POST['comuna_id'];
        if(isset($_POST['baseimg'])){
            $img = $_POST['baseimg'];
        }else{
            $img = '';
        }
        $usuario = ['tipo_usr' => $tipo_usr,'id_usr'=> $id_usr,'nombres'=>$nombres,'apellidoP'=>$apellidoP,'apellidoM'=>$apellidoM,'rut'=>$rut,'tipo_usr'=>$tipo_usr,'correo'=>$correo,'telefono'=>$telefono,'direccion'=>$direccion,'comuna'=>$comuna,'img'=>$img];
        $retorno = $this->model->updateUsr($usuario);
        if($retorno){
            echo '<script>alert("Usuario Actualizado con Éxito");</script>';
            session_start();
            if($_SESSION['tipo_usr'] == 2){
                $this->view->render('usuario/user_prof');
            }else{
                header("location:".constant('URL').edicionusuario."");
            }
            
            
        }else{
            $this->render();
        }
    }

    function actualizaClave(){
        //$tipousr = $_POST['rol_id'];
        $id_usr = $_POST['id_usrclave'];
        $contraseña = $_POST['pass'];
        $contraseña = base64_encode($contraseña);
        $usuario = ['id_usr'=> $id_usr,'contraseña' => $contraseña];
        $retorno = $this->model->actualizaClave($usuario);
        if($retorno){
            //echo '<script>alert("Conrtaseña Actualizado con Éxito");</script>';
            session_start();
            if($_SESSION['tipo_usr'] == 2){
                $this->view->render('usuario/user_prof');
            }else{
                header("location:".constant('URL').edicionusuario."");
            }
            
            
        }else{
            $this->render();
        }
    }    

    function correo($mail){
        $correoHTML = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <script src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
            <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        </head>
        <body>
            <div class="container">
                <div class="row">
                    <div class="col-md-12" align="center" style="padding:3rem;background-color:#059485">
                            <img src="https://www.zerodev.cl/mvcProyect/public/img/logo-2kanui.png" alt="Kanui" style="width:250px;">
                            <div class="container-fluid" style="margin-top:3rem;">
                                    <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10" align="center" style="padding:1rem; background-color: #fff;border-radius:15px">
                                                <h1>Bienvenido!</h1>
                                                <h3>Tu registro esta a un paso de estar listo</h3>
                                                <h5>Para finalizar tu registro <br><br><br>
                                                    <a href="https://www.zerodev.cl/mvcProyect/api/regcorreo?referer='.$mail.'">Haz click Aqui</a>
                                                </h5>
                                            </div>
                                            <div class="col-md-1"></div>
                            </div>
                    
                        </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-md-12" align="center" style="font-size: 12px;">
                        <hr>
                        Este correo Ha sido enviado automaticamente desde kanui@zerodev.cl, favor no responder, <br>
                        el comprobar el correo es un paso esencial para la seguridad de sus datos, <br>
                        Kanui es propiedad intelectual de zerodev.cl
                    </div>
                </div>
            </div>
        </body>
        </html>';
    require "PHPMailer/PHPMailer.php";
    require "PHPMailer/SMTP.php";
    require "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    //smtp settings
    $mail->isSMTP();
    $mail->Host       = "mail.zerodev.cl"; 
    $mail->SMTPAuth = true;
    $mail->Username = "kanui@zerodev.cl";
    $mail->Password = "mailKanui";
    $mail->Port=587;//587 465 TLS
    $mail->SMTPSecure = "tls";
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    //Envio 
    $mail->From = 'kanui@zerodev.cl';
    $mail->FromName = "Kanui";
    $mail->addAddress($mail, 'Bienvenido');
    $mail->Subject = "Bienvenido";
    
    $mail->IsHTML(true); 
    $mail->AddEmbeddedImage('https://www.zerodev.cl/mvcProyect//public/img/logo-2kanui.png','logo.jpg' ,'logo');
    $mail->Body = $correoHTML;
    $mail->AltBody="This is text only alternative body.";
    if($mail->send()){
        //$response = "enviados";
        echo "<script>window.location.href='".constant('URL')."login';</script>";
    }else{
        $response = "algo malo <br><br> ". $mail->ErrorInfo;
        exit(json_encode(array("response"=>$response)));
    }


    }
    
}


?>