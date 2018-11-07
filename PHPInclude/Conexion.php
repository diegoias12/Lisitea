<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'base_de_datos';
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn)
{
    die("Conexion Fallida: " . mysqli_connect_error());
}
?>
