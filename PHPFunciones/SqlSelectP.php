<?php
// Se verifica que la variable existe
if(!(isset($_POST['tabla']) && isset($_POST['llave']) && isset($_POST['id'])))
{
    echo 'Error: SqlSelect.php';
    return;
}
require '../PHPInclude/Conexion.php';
try
{
    // Crea la conexion con la BD
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $tabla = $_POST['tabla'];
    $llave = $_POST['llave'];
    $id = $_POST['id'];
    // Crear la cadena con la PK de la tabla, se omite 'tbl'
    $pk = 'PK_id' . substr($tabla, 3);
    // Se pregunta por una llave en especifico en alguna tabla
    $consulta = $conn->query('SELECT ' . $llave . ' FROM ' . $tabla . ' WHERE ' . $pk . '=' . $id);
    $row = $consulta->fetch();
    echo $row[$llave];
}
catch (PDOException $e)
{
    echo "Error: SqlSelectP.php - " . $e->getMessage();
}
$conn = null;
?>
