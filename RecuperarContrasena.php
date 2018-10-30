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
            // Avast -> Settings -> Components -> Mail Shield (Customize) -> SMTP = false
            //$mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'asistencia.lisitea@gmail.com';
            $mail->Password = '9y4%Jkt/';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            //Recipients
            $mail->setFrom('asistencia.lisitea@gmail.com', 'Lisitea');
            $mail->addAddress($email);

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
