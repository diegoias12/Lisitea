<?php
/*
$servername = "localhost";
$username = "zxero2_LisiteaUsuario";
$password = "Z6e!e5~N2$@@";
$databasename = "zxero2_LisiteaBD";
*/
$servername = "localhost";
$username = "zxero2_LisiteaUsuario";
$password = "Z6e!e5~N2$@@";
$databasename = "zxero2_LisiteaBD";

// Crear conexion
$conexion = new mysqli($servername, $username, $password, $databasename);

// Checar conexion
if($conexion->connect_error)
{
    die("Fallo de conexion: " . $conexion->connect_error);
}
echo "conexion exitosa";

?>
