<?php
// Se verifica que la variable existe
if(!(isset($_POST['sqlDelete'])))
{
    echo 'Error: SqlDelete';
    return;
}
require '../PHPInclude/Conexion.php';
try
{
    // Crea la conexion con la BD
    // Se borran los elementos
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec($_POST['sqlDelete']);
    echo 'true';
}
catch (PDOException $e)
{
    echo "Error: IngresarElemento() - " . $e->getMessage();
}
$conn = null;
?>
