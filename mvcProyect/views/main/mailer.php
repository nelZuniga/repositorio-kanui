<?php 

use PHPMailer\PHPMailer\PHPMailer;

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
    $mail->FromName = "Nel";
    $mail->addAddress('nel_zuniga@hotmail.com', 'nel');
    $mail->Subject = "Algo";
    $mail->Body = "Algo tambien";
    if($mail->send())
        $response = "enviado";
    else
        $response = "algo malo <br><br> ". $mail->ErrorInfo;
    exit(json_encode(array("response"=>$response)));




?>
