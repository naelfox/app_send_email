<?php
require_once "./userCredentials.php";
require_once "./data/message.php";
require_once "./PHPMailer/Exception.php";
require_once "./PHPMailer/OAuthTokenProvider.php";
require_once "./PHPMailer/OAuth.php";
require_once "./PHPMailer/PHPMailer.php";
require_once "./PHPMailer/POP3.php";
require_once "./PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_POST['sendMail'] == 1) {

    $credentials = new Credentials();
    $message = new Message();
    $mail = new PHPMailer(true);

    $message->setAtribute('to', $_POST['to']);
    $message->setAtribute('subject', $_POST['subject']);
    $message->setAtribute('message', $_POST['message']);


    if (!$message->validateMessage()) {
        echo 'Message is not valid';
        // header('Location: index.php');
    }

    try {
        //Server settings
        $mail->SMTPDebug = false;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $credentials->getHost();                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $credentials->getUsername();                     //SMTP username
        $mail->Password   = $credentials->getPassword();                               //SMTP password
        $mail->SMTPSecure = 'tls';         //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('email@email.com', 'Site User');
        $mail->addAddress($message->getAtribute('to'), 'Site User');     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
    
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $message->getAtribute('subject');
        $mail->Body    = $message->getAtribute('message');
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
    
    
        $message->status['cod_status'] = 1;
        $message->status['description_status'] = 'Message has been sent';
    } catch (Exception $e) {
    
        $message->status['cod_status'] = 2;
        $message->status['description_status'] = "Message could not be sent. Error Details: {$mail->ErrorInfo}";
    }




} else {
    // header('Location: ./index.php');
}







?>
