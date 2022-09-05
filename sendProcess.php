<?php

require "./PHPMailer/Exception.php";
require "./PHPMailer/OAuthTokenProvider.php";
require "./PHPMailer/OAuth.php";
require "./PHPMailer/PHPMailer.php";
require "./PHPMailer/POP3.php";
require "./PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Message
{
    private $to = null;
    private $subject = null;
    private $message = null;

    public $status = array('cod_status' => null, 'description_status' => '');


    public function getAtribute($atribute)
    {
        return $this->$atribute;
    }

    public function setAtribute($atribute, $value)
    {
        $this->$atribute = $value;
    }

    public function validateMessage()
    {
        if (empty($this->to) || empty($this->subject || empty($this->message))) {
            return false;
        }

        return true;
    }
}

$mensagem = new Message();

$mensagem->setAtribute('to', $_POST['to']);
$mensagem->setAtribute('subject', $_POST['subject']);
$mensagem->setAtribute('message', $_POST['message']);

if (!$mensagem->validateMessage()) {
    echo 'Message is not valid';
    header('Location: index.php');
}

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = false;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp-mail.outlook.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'email';                     //SMTP username
    $mail->Password   = 'senha';                               //SMTP password
    $mail->SMTPSecure = 'tls';         //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('email@email.com', 'Site User');
    $mail->addAddress($mensagem->getAtribute('to'), 'Site User');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $mensagem->getAtribute('subject');
    $mail->Body    = $mensagem->getAtribute('message');
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();


    $mensagem->status['cod_status'] = 1;
    $mensagem->status['description_status'] = 'Message has been sent';
} catch (Exception $e) {

    $mensagem->status['cod_status'] = 2;
    $mensagem->status['description_status'] = "Message could not be sent. Error Details: {$mail->ErrorInfo}";
}

?>


<div class="py-3 text-center">
    <img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
    <h2>Send Mail</h2>
    <p class="lead">Your app to send emails! </p>
    <? if ($mensagem->status['cod_status'] == 1): ?>
        <h1><?= $mensagem->status['description_status']; ?></h1>

    <? elseif ($mensagem->status['cod_status'] == 2): ?>
        <h1><?= $mensagem->status['description_status']; ?></h1>
    <? endif; ?>
    <a href="index.php">Back</a>

</div>