<?php
function select() {
// Se verifica que la variable existe
if(!(isset($_POST['sqlSelect'])))
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
    $llave = $_POST['llave'];
    $tabla = $_POST['tabla'];
    // Crear la cadena con la PK de la tabla, se omite 'tbl'
    $pk = 'PK_id' . substr($tabla, 3);
    // Se pregunta por una llave en especifico en alguna tabla
    $consulta = $conn->query($_POST['sqlSelect']);
    if($consulta == null)
    {
        console.log('SqlSelect.php - Tabla sin contenido');
        return;
    }
    
}
catch (PDOException $e)
{
    echo "Error: IngresarElemento() - " . $e->getMessage();
}
$conn = null;
}
?>
