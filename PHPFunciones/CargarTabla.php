<?php
if(!(isset($_GET['tabla'])))
{
    return;
}
$tabla = $_GET['tabla'];

require 'Conexion.php';
try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare('SELECT * FROM ' . $tabla);

    $name = 'radioBtn_' . $tabla;

    // Nombre de las columnas
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_OBJ);
    $i = 0;
    $consulta = $stmt->fetch();
    if($consulta == null)
    {
        echo 'No hay ni madres';
        return;
    }
    echo '<table>'
    . '       <tr>'
    . '       <td>'
    . '           <input type="radio" name="' . $name . '" value="-1">'
    . '       </td>';
    foreach($consulta as $k=>$v)
    {
        echo
          '<td style="width:150px;border:1px solid black;">'
        . '    <div class="label">'
        .          $k
        . '    </div>'
        . '</td>';
        $i++;
    }
    echo
      '</tr>';
    // Fin

    // Contenido de la tabla
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $consulta = $stmt->fetchAll();
    foreach($consulta as $k=>$v)
    {
        $i = 0;
        foreach ($v as $value) {
            if($i == 0)
            {
                echo
                  '<tr>'
                . '    <td>'
                . '        <input type="radio" name="' . $name . '"'
                . '        value="' . $value . '">'
                . '    </td>';
            }
            echo
              '        <td style="width:150px;border:1px solid black;">'
            . '            <div class="label">' . $value . '</div>'
            . '        </td>';
            $i++;
        }
        echo '</tr>';
    }
    // Fin
}
catch(PDOException $e)
{
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
