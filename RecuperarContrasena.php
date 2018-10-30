<!doctype html>

<?php
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL) === false)
    {
        // Mandar correo
        // Buscar email y tomar su contrasena
        $pss = "pass"
        mail($email, "Recuperación de contraseña", $pss);
    }
    // Se muestra el mensaje sea o no email
    // Esto se hace para proteger la BD
    echo 'Correo enviado';
?>

<html>
<head>
    <title>Contrase&ntilde;a - CECyTEM Tequixquiac</title>
</head>

<body>
    <form method="post" action="RecuperarContrasena.php">
        <input name="email" type="email" maxlength="40" placeholder="Correo electr&oacute;nico">
        <br>
        <br>
        <input type="submit" value="Recuperar Contrase&ntilde;a">
    </form>
</body>
</html>
