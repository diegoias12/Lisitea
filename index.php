<!doctype html>

<?php
    session_start();
    /* @@@@@@@@@@@@@@@@@@@ BD @@@@@@@@@@@@@@@@@@
        Obtener la contraseña correspondiente
        al correo ingresado
        tbl_usuario
            VCH_correo_electronico
            VCH_contrasenia

        @@@@@@@@@@@@@@@@@@@ Diseño @@@@@@@@@@@@@@@@@@
        Usar logos, crear un inicio de sesión amigable
    */
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
    {
        header("Location: Inicio.php");
    }
    $_SESSION['loggedin'] = false;
    if(isset($_POST['email']) && isset($_POST['psw']))
    {
        // Base de datos
        $email = "mail@mail.com";
        $psw = "pass";
        if($_POST['email'] == $email && $_POST['psw'] == $psw )
        {
            $_SESSION['loggedin'] = true;
            header("Location: Inicio.php");
        }
    }
?>

<html>
<head>
    <title>Creacion - CECyTEM Tequixquiac</title>
</head>

<body>
    <form method="post" action="index.php">
        <input name="email" type="email" maxlength="40" placeholder="Correo electr&oacute;nico">
        <br>
        <br>
        <input name="psw" type="text" maxlength="10" placeholder="Contrase&ntilde;a">
        <br>
        <br>
        <input type="submit" value="Iniciar sesi&oacute;n">
        <a href="RecuperarContrasena.php">&iquest;Olvidaste tu contrase&ntilde;a?</a>
    </form>
</body>
</html>
