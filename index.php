<!doctype html>

<html>
<head>
    <?php /*require 'PHPInclude\\Head.php';*/ ?>
    <?php /*include 'PHPInclude\\Head.php';*/ ?>
    <title>Creacion - CECyTEM Tequixquiac</title>
</head>

<body>
    <form method="post" action="../PHPFunciones/ValidarSesion.php">
        <input name="email" type="email" maxlength="40" placeholder="Correo electr&oacute;nico">
        <br>
        <br>
        <input name="psw" type="text" maxlength="10" placeholder="Contrase&ntilde;a">
        <br>
        <br>
        <input type="submit" value="Iniciar sesi&oacute;n">
        <a href="../HTMLVentanas/RecuperarContrasena.php">&iquest;Olvidaste tu contrase&ntilde;a?</a>
    </form>
</body>
</html>
