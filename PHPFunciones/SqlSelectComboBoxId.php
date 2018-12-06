<?php
// Se verifica que la variable existe
if(!(isset($_POST['tabla']) && isset($_POST['llave'])
&& isset($_POST['padre']) && isset($_POST['padreId'])))
{
    echo 'Error: SqlSelectComboBoxId.php';
    return;
}
require '../PHPInclude/Conexion.php';
try
{
    echo '<option value="-1"></option>';
    // Crea la conexion con la BD
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $tabla = $_POST['tabla'];
    $llave = $_POST['llave'];
    $padre = $_POST['padre'];
    $padreId = $_POST['padreId'];
    // Crear la cadena con la PK de la tabla, se omite 'tbl'
    $pk = 'PK_id' . substr($tabla, 3);
    $fk = 'FK_id' . substr($padre, 3);
    // Se pregunta por una llave en especifico en alguna tabla
    $sql = 'SELECT ' . $pk . ', ' . $llave . ' FROM ' . $tabla . ' WHERE ' . $fk . '=' . $padreId;
    $consulta = $conn->query($sql)->fetchAll();
    if($consulta == null)
    {
        return;
    }
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
