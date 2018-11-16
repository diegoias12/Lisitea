<?php
function CrearTabla($tabla, $hijo)
{
    require 'Conexion.php';
    echo '<table>';
    try
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare('SELECT * FROM ' . $tabla);

        // Nombre de las columnas
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_OBJ);
        echo
          '<tr>'
        . '    <td></td>';
        $llaves = array();
        foreach($stmt->fetch() as $k=>$v)
        {
            array_push($llaves, $k);
            echo
              '<td style="width:150px;border:1px solid black;">'
            . '    <div class="label">'
            .          $k
            . '    </div>'
            . '</td>';
        }
        echo
          '</tr>';
        // Fin

        // Contenido de la tabla
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $consulta = $stmt->fetchAll();
        $name = 'radioBtn_' . $tabla;
        foreach($consulta as $k=>$v)
        {
            $i = 0;
            foreach ($v as $value) {
                $strid = substr($llaves[$i++], 0, 3);
                if($strid == 'PK_')
                {
                    echo
                      '<tr>'
                    . '    <td>'
                    . '        <input type="radio" name="' . $name . '"'
                    . '        onclick="MostrarDependencia(&quot;' . $hijo . '&quot;)"'
                    . '        <?php'
                    . '        if(isset($' . $name . ') &amp;&amp; $' . $name . '=="' . $value . '")'
                    . '            echo "checked";'
                    . '        ?&gt;'
                    . '        value="' . $value . '"&gt;'
                    . '    </td>';
                }
                echo
                  '        <td style="width:150px;border:1px solid black;">'
                . '            <div class="label">'
                .                  $value
                . '            </div>'
                . '        </td>';
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
