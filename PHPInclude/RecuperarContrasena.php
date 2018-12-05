<?php
header("Content-Type: text/html;charset=utf-8");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL) === false)
    {
        include 'PHPInclude\Conexion.php';
        $conn = mysqli_connect($host, $username, $password, $database);
        if (!$conn)
        {
            die("Conexion Fallida: " . mysqli_connect_error());
        }
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
                $mail->Subject = 'Recuperaraci&oacute;n de contraseña';
                $mail->Body    = 'Su contraseña es: <b>' . $password . '</b>';
                $mail->AltBody = 'Su contraseña es: ' . $password;

                $mail->send();
            }
            catch (Exception $e)
            {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
        }
        echo '<div id="myModal" class="modal" style="display:block;">'
            .     '<div class = "modal-content">'
            .         '<span class="close">&times;</span>'
            .          '<div class="mensaje">'
            .              '<p align="center" style="font-size:25px">La contrase&ntilde;a fue enviada al correo</p>'
            .          '</div>'
            .          '<center><button id="accept" class="block" style="padding:5px;width:30%;" onclick="funcion2()">Aceptar</button></center>'
            .      '</div>'
            .  '</div>';
    }
}
?>
