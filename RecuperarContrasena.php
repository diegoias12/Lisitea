<!doctype html>

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
                  echo 'Message has been sent';
;
            }
            catch (Exception $e)
            {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
        }
    }
    // Se muestra el mensaje de que el correo ha sido enviado sea o no email
    // Esto se hace para proteger la BD
    // Esto no lo puedes hacer por que tienes un try-cath, ademas de que muchas paginas ayudan al cliente avisandole si el correo fue encontrado
}
?>
<html>
<head>
    <title>Contrase&ntilde;a - CECyTEM Tequixquiac</title>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/Index.css"/>
</head>

<body>
  <div class="header">
      <img src="Imagenes/GobEdoMex.png" style="height:100px;width:300px;float:left;">
      <img src="Imagenes/CECyTEM.png" style="height:100px;width:100px;float:right;">
  </div>
    <div class="aplicacion-main" style="height:400px;padding-top:1px;padding-bottom:1px;">
        <div class="contenedor" align="center" style="margin-top:5%">
            <div class="formato" style="max-width:300px;">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <dl class="grupoconformato">
                        <dt class="imput-label">
                            <label class="formato-label1">
                                <font style="vertical-aling:inherit;">
                                Email
                                </font>
                            </label>
                        </dt>
                        <dd style="margin:0;width:90%;">
                            <input name="email" type="email" maxlength="40" placeholder="Correo electr&oacute;nico" class="formato-imput">
                        </dd>
                    </dl>
                    <dl class="grupoconformato">
                        <dd style="margin:0;width:90%;">
                            <input type="submit" value="Recuperar Contrase&ntilde;a" class="block">

                        </dd>
                        <dd style="margin:0;width:90%;">
                            <!--boton para reresar a la ventana de inicio-->
                            <input type="button" value="Cancelar" onclick="funcion1()" class="block" style="margin-top:5px;">
                        </dd>
                    </dl>
                </form>
            <?php echo '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'; ?>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal" style="display:block;">
        <div class = "modal-content">
            <span class="close">&times;</span>
            <div class="mensaje">
                <p align="center" style="font-size:25px">Correo no valido.</p>
            </div>
            <center><button id="accept" class="block" style="padding:5px;width:30%;" onclick="funcion2()">Aceptar</button></center>
        </div>
    </div>
</body>
</html>

<script>
var modal = document.getElementById('myModal');
var span = document.getElementsByClassName("close")[0];
function funcion1() {
    location.href="PHPFunciones/CerrarSesion.php";
}
function funcion2(){
    modal.style.display = "none";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
