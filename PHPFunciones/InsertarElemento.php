<?php
// Se verifica que la variable existe
if(!(isset($_GET['sqlInsert'])))
{
    echo 'Error: IngresarElemento() - InsertarElemento.php';
    return;
}
$sqlInsert = $_GET['sqlInsert'];
require '../PHPInclude/Conexion.php';
try
{
    // Crea la conexion con la BD
    // Se hace el insert y devuelve el ultimo Id generado
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec($sqlInsert);
    $lastId = $conn->lastInsertId();
    echo $lastId;
}
catch (PDOException $e)
{
    echo "Error: IngresarElemento() - " . $e->getMessage();
}
$conn = null;
?>
