<?php
// Se verifica que la variable existe
if(!(isset($_GET['tabla'])))
{
    echo 'Error: CargarTabla.php';
    return;
}
$tabla = $_GET['tabla'];
require '../PHPInclude/Conexion.php';

try
{
    // Se crea la conexion con la BD
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Se genera una fila con los nombres de las llaves
    $stmt = $conn->prepare('SELECT * FROM ' . $tabla);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_OBJ);
    $consulta = $stmt->fetch();
    if($consulta == null)
    {
        echo 'CargarTabla.php - Sin contenido (1)';
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
    // Se imprimen todos las llaves excepto la primera
    // la cual es la PK
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
              '<td class="celda">'
            . '    <div class="label">' . $k . '</div>'
            . '</td>';
        }
        $i++;
    }
    echo '</tr>';

    // Dependiendo de las variables con las que se cuentan, se puede
    // deducir el tipo de relacion que tiene con las otras tablas,
    // con esto se pueden crear los filtros al momento de hacer el stmt

    // Si se cuenta con un padre, el stmt tendra un cambio
    if(isset($_GET['padre']) && isset($_GET['padreId']))
    {
        // Si se cuenta con una relacion, se necesita la tabla intermedia
        // para mostrar solo aquellos elementos que estan relacionados
        // con la Id del padre
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
        // En caso de que solo se tenga padre y padreId, se hace el
        // filtro utilizando el id del padre
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
        echo 'CargarTabla.php - Sin contenido (2)';
        return;
    }
    // Se crea toda la tabla con el stmt creado
    foreach($consulta as $k=>$v)
    {
        $i = 0;
        foreach ($v as $value) {
            // La PK no se muestra, su valor se almacena en los radioButton
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
                  '<td class="celda">'
                . '    <div class="label">' . $value . '</div>'
                . '</td>';
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
