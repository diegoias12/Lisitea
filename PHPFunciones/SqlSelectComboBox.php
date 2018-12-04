<?php
// Se verifica que la variable existe
if(!(isset($_POST['tabla']) && isset($_POST['llave'])))
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
    // Crear la cadena con la PK de la tabla, se omite 'tbl'
    $pk = 'PK_id' . substr($tabla, 3);
    // Se pregunta por una llave en especifico en alguna tabla
    $consulta = $conn->query('SELECT ' . $pk . ', ' . $llave . ' FROM ' . $tabla)->fetchAll();
    if($consulta == null)
    {
        return;
    }
    echo '<option></option>';
    foreach($consulta as $row) {
        echo '<option value="' . $row[$pk] . '">' . $row[$llave] . '</option>';
    }
}
catch (PDOException $e)
{
    echo "Error: IngresarElemento() - " . $e->getMessage();
}
$conn = null;
?>
