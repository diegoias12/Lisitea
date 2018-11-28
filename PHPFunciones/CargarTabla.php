<?php
if(!(isset($_GET['tabla'])))
{
    echo 'Error: CargarTabla.php';
    return;
}
$tabla = $_GET['tabla'];
require '../PHPInclude/Conexion.php';

try
{
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Nombre de las columnas
    $stmt = $conn->prepare('SELECT * FROM ' . $tabla);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_OBJ);
    $consulta = $stmt->fetch();
    if($consulta == null)
    {
        echo 'CargarTabla.php - No hay ni madres';
        return;
    }

    $name = 'radioBtn_' . $tabla;
    echo
      '<table>'
    . '   <tr class="llave">'
    . '       <td></td>';
    if(isset($_GET['padre']))
    {
        $padre = $_GET['padre'];
        $fkIdPadre = 'FK_id_' . substr($padre, 4);
    }
    $i = 0;
    foreach($consulta as $k=>$v)
    {
        //if(isset($_GET['padre']) && $k == $fkIdPadre)
        //{
        //    $padrePos = $i;
        //}
        //else
        if($i != 0)
        {
            echo
              '<td style="width:150px;border:1px solid black;">'
            . '    <div class="label">' . $k . '</div>'
            . '</td>';
        }
        $i++;
    }
    echo
      '</tr>';
    // Fin

    // Contenido de la tabla
    if(isset($_GET['padre']) && isset($_GET['padreId']))
    {
        if(isset($_GET['relacion']))
        {
            $padreNom = substr($padre, 4);
            $relacNom = substr($_GET['relacion'], 4);
            $tablaNom = substr($tabla, 4);
            $stmt = $conn->prepare(
              'SELECT c.*'
            . ' FROM ' . $padre . ' a, ' . $_GET['relacion'] . ' b, ' . $tabla . ' c'
            . ' WHERE a.PK_id_' . $padreNom . ' = b.PFK_id_' . $padreNom
            . ' and c.PK_id_' . $tablaNom . ' = b.PFK_id_' . $tablaNom
            . ' and a.PK_id_' . $padreNom . ' = ' . $_GET['padreId']);
        }
        else
        {
            $stmt = $conn->prepare(
              'SELECT *'
            . ' FROM ' . $tabla
            . ' WHERE ' . $fkIdPadre . ' = "' . $_GET['padreId'] . '"');
        }
    }
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $consulta = $stmt->fetchAll();
    if($consulta == null)
    {
        echo 'CargarTabla.php - Sin contenido';
        return;
    }
    foreach($consulta as $k=>$v)
    {
        $i = 0;
        foreach ($v as $value) {
            if($i == 0)
            {
                echo
                  '<tr>'
                . '    <td>'
                . '        <input type="radio" name="' . $name . '" value="' . $value . '">'
                . '    </td>';
            }
            //elseif(isset($_GET['padre']) && $i == $padrePos)
            //{
            //    // No mostrar
            //}
            else
            {
                echo
                  '        <td style="width:150px;border:1px solid black;">'
                . '            <div class="label">' . $value . '</div>'
                . '        </td>';
            }
            $i++;
        }
        echo '</tr>';
    }
    // Fin
    $conn = null;
    echo '</table>';
}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}
?>
