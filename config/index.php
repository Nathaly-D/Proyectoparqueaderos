<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    //Server settings
    $mail->SMTPDebug = 2;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'parqueaderosMaster@gmail.com';                     //SMTP username
    $mail->Password   = 'yrdv onxs rdiz hkzi';                               //SMTP password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->AuthType = 'LOGIN';
 // o el puerto requerido por tu servidor SMTP
                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('parqueaderosMaster@gmail.com', 'Parqueaderos');
    $mail->addAddress('danielleones402@gmail.com');     //Add a recipient               //Name is optional

    //Attachments   //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Prueba esta';
    $mail->Body    = '13 JAJAJAJAJAJJAJAJA <b>in bold!</b>';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}