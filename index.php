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
        $conn = mysqli_connect("localhost", "root", "", "base_de_datos");
		if (!$conn)
		{
			die("Conexion Fallida: " . mysqli_connect_error());
		} 
        $sql = 'SELECT VCH_correo_electronico, VCH_contrasenia '
             . 'FROM tbl_usuario '
             . 'WHERE VCH_correo_electronico = "' . $email . '" AND VCH_contrasenia = "' . $psw . '"';
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result))
		{
			$_SESSION['loggedin'] = true;
            header("Location: Inicio.php");
		}
		mysqli_close($conn);
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
