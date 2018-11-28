<?php
if(!(isset($_GET['sqlInsert'])))
{
    echo 'Error: InsertarElemento.php';
    return false;
}
$sqlInsert = $_GET['sqlInsert'];
require '../PHPInclude/Conexion.php';

try
{
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec($sqlInsert);
    $conn = null;
    return true;
}
catch (PDOException $e)
{
    echo "Error: " . $e->getMessage();
    return false;
}
?>
