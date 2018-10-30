<!doctype html>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $email = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL) === false)
    {
        $pss = 'pass';
        $mail = new PHPMailer;
        try
        {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'gmail-smtp-in.l.google.com';                       // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'asistencia.lisitea@gmail.com';     // SMTP username
            $mail->Password = '9y4%Jkt/';                         // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('asistencia.lisitea@gmail.com', 'Lisitea');
            $mail->addAddress('diegoias.dias@gmail.com');

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        }
        catch (Exception $e)
        {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
    // Se muestra el mensaje de que el correo ha sido enviado sea o no email
    // Esto se hace para proteger la BD

}
?>

<html>
<head>
    <title>Contrase&ntilde;a - CECyTEM Tequixquiac</title>
</head>

<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input name="mail" type="email" maxlength="40" placeholder="Correo electr&oacute;nico">
        <br>
        <br>
        <input type="submit" value="Recuperar Contrase&ntilde;a">
    </form>
    <?php echo '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'; ?>
</body>
</html>
