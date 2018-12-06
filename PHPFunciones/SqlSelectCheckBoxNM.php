<?php
// Se verifica que la variable existe
if(!isset($_POST['padreId']) || $_POST['padreId'] == '')
{
    return;
}
if(!(isset($_POST['tabla']) && isset($_POST['llave'])
&& isset($_POST['padre']) && isset($_POST['relacion'])))
{
    echo 'Error: SqlSelectCheckBoxNM.php';
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
    $padre = $_POST['padre'];
    $padreId = $_POST['padreId'];
    $relacion = $_POST['relacion'];
    //
    $padreNom = substr($padre, 3);
    $relacNom = substr($_POST['relacion'], 3);
    $tablaNom = substr($tabla, 3);
    $sql =
      'SELECT c.*'
    . ' FROM ' . $padre . ' a, ' . $relacion . ' b, ' . $tabla . ' c'
    . ' WHERE a.PK_id' . $padreNom . ' = b.PFK_id' . $padreNom
    . ' and c.PK_id' . $tablaNom . ' = b.PFK_id' . $tablaNom
    . ' and a.PK_id' . $padreNom . ' = ' . $padreId;
    $consulta = $conn->query($sql)->fetchAll();
    if($consulta == null)
    {
        return;
    }
    // <input type="checkbox" name="" value=""> txt <br>
    $name = 'radio' . substr($tabla, 3);
    $pk = 'PK_id' . substr($tabla, 3);
    foreach($consulta as $row) {
        echo '<input type="checkbox" name="' . $name . '" value="' . $row[$pk] . '">'
        . $row[$llave] . '<br>';
    }
}
catch (PDOException $e)
{
    echo "Error: SqlSelectCheckBoxNM.php - " . $e->getMessage();
}
$conn = null;
?>
