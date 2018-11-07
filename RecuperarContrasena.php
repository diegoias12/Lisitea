<!doctype html>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL) === false)
    {
        include 'PHPInclude\Conexion.php';
        $sql = 'SELECT VCH_contrasenia '
             . 'FROM tbl_usuario '
             . 'WHERE VCH_correo_electronico = "' . $email . '"';
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result))
        {
            $row = mysqli_fetch_assoc($result);
            $password = $row['VCH_contrasenia'];
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
                $mail->isHTML(true);
                $mail->Subject = 'Recuperaración de contraseña';
                $mail->Body    = 'Su contraseña es: <b>' . $password . '</b>';
                $mail->AltBody = 'Su contraseña es: ' . $password;

                $mail->send();
                echo 'Message has been sent';
            }
            catch (Exception $e)
            {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
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
        <input name="email" type="email" maxlength="40" placeholder="Correo electr&oacute;nico">
        <br>
        <br>
        <input type="submit" value="Recuperar Contrase&ntilde;a">
    </form>
    <?php echo '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'; ?>

    <!-- Regresar a index.php -->
</body>
</html>
