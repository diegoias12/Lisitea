<?php
// Se verifica que la variable existe
if(!(isset($_POST['sqlUpdate'])))
{
    echo 'Error: IngresarElemento() - InsertarElemento.php';
    return;
}
require '../PHPInclude/Conexion.php';
try
{
    // Crea la conexion con la BD
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Se hace la actualizacion
    $stmt = $conn->prepare($_POST['sqlUpdate']);
    $stmt->execute();
    echo 'true';
}
catch (PDOException $e)
{
    echo "Error: IngresarElemento() - " . $e->getMessage();
}
$conn = null;
?>
