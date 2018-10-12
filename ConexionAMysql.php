<?php
$servername = "localhost";
$username = "username";
$password = "password";

// Crear conexion
$conexion = new mysqli($servername, $username, $password);

// Checar conexion
if($conexion->connect_error)
{
    die("Fallo de conexion: " . $conexion->connect_error);
}
echo "conexion exitosa";

?>
