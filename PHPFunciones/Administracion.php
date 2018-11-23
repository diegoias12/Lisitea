<?php
function CrearTabla($tabla, $padre)
{
    require 'Conexion.php';
    echo '<table>';
    try
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare('SELECT * FROM ' . $tabla);

        $name = 'radioBtn_' . $tabla;
        $PK = 'PK_id_' . substr($tabla, 4, strlen($tabla) - 4);
        $posPK = -1;
        $FK = 'FK_id_' . substr($padre, 4, strlen($padre) - 4);
        $posFK = -1;

        // Nombre de las columnas
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_OBJ);
        $i = 0;
        echo
          '<tr>'
        . '    <td></td>';
        foreach($stmt->fetch() as $k=>$v)
        {
            if($k == $FK)
            {
                $posFK = $i;
            }
            else if($k == $PK)
            {
                $posPK = $i;
            }
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
                if($i == $posPK)
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
}
?>
