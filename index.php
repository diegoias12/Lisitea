<!doctype html>

<?php
    session_start();
    /*
        @@@@@@@@@@@@@@@@@@@ Diseño @@@@@@@@@@@@@@@@@@
        Usar logos, crear un inicio de sesión amigable
    */
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
    {
        header('Location: Inicio.php');
    }
    $_SESSION['loggedin'] = false;
    if(isset($_POST['email']) && isset($_POST['psw']))
    {
        $email = $_POST['email'];
        $psw = $_POST['psw'];
        require 'PHPInclude\Conexion.php';
        //mysqli_query($conn, 'INSERT INTO tbl_usuario(VCH_correo_electronico, VCH_contrasenia) VALUES ("mail@mail.com","pass")');
        $sql = 'SELECT VCH_correo_electronico, VCH_contrasenia '
             . 'FROM tbl_usuario '
             . 'WHERE VCH_correo_electronico = "' . $email . '" AND VCH_contrasenia = "' . $psw . '"';
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result))
		{
			$_SESSION['loggedin'] = true;
            header("Location: Inicio.php");
		}
    else {
        echo '<div id="myModal" class="modal" style="display:block;">'
            .     '<div class = "modal-content">'
            .         '<span class="close">&times;</span>'
            .          '<div class="mensaje">'
            .              '<p align="center" style="font-size:25px">Datos incorrectos</p>'
            .          '</div>'
            .          '<center><button id="accept" class="block" style="padding:5px;width:30%;" onclick="funcion2()">Aceptar</button></center>'
            .      '</div>'
            .  '</div>';
    }
		mysqli_close($conn);
    }
?>

<html>
<head>
    <title>Lisitea</title>
    <meta content="width=device-width, initial-sacale=1">
    <link rel="stylesheet" type="text/css" href="CSSEstilos/Index.css"/>
</head>

<body>
    <div class="header">
        <img src="Imagenes/GobEdoMex.png" style="height:100px;width:300px;float:left;">
        <img src="Imagenes/CECyTEM.png" style="height:100px;width:100px;float:right;">
    </div>
    <div class="aplicacion-main">
        <div class="contenedor">
            <div class="item">
                <div class="informacion">
                    <h1 class="texto1">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">
                        Lisitea
                        </font>
                    </font>
                    </h1>
                    <p>
                    Lisitea es una plataforma que
                    automatiza  el  llenado  de  la  planeación estrategica
                    realizada  por  los  profesores  del  CECyTEM  Tequixquiac
                    </p>
                </div>
                <div class="iniciar">
                    <div class="formato">
                        <form method="post" action="index.php">
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
                                <dt class="imput-label">
                                    <label class="formato-label1">
                                        <font style="vertical-align:inherit;">
                                        Constraseña
                                        <a class="recuperar" href="RecuperarContrasena.php">&iquest;Olvidaste tu contrase&ntilde;a?</a>
                                        </font>
                                    </label>
                                </dt>
                                <dd style="margin:0;width:90%;">
                                    <input name="psw" type="text" maxlength="10" placeholder="Contrase&ntilde;a" class="formato-imput">
                                </dd>
                            </dl>
                            <button class="block" type="submit" value="Iniciar sesi&oacute;n">
                                <font style="vertical-align:inherit";>
                                Iniciar sesi&oacute;n
                                </font>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
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
