<?php
class TableRows extends RecursiveIteratorIterator
{
    private $clsTabla = '';

    public function setTable($tabla)
    {
        $this->clsTabla = $tabla;
    }

    public function getTable()
    {
        return $this->clsTabla;
    }

    function __construct($it)
    {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current()
    {
        return
          '<td style="width:150px;border:1px solid black;">'
        . '    <div class="label">'
        .          parent::current()
        . '    </div>'
        . '</td>';
    }

    function beginChildren()
    {
        // cambiar "female" por el id
        $name = 'radioBtn_' . $this->getTable();
        echo
          '<tr>'
        . '    <td>'
        . '        <input type="radio" name="' . $name . '"'
        . '        <?php'
        . '        if(isset($' . $name . ') &amp;&amp; $' . $name . '=="female")'
        . '            echo "checked";'
        . '        ?&gt;'
        . '        value="female"&gt;'
        . '    </td>';
    }

    function endChildren()
    {
        echo '</tr>';
    }
}

function CrearTabla($tabla)
{
    echo '<table>';
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'base_de_datos';
    try
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare('SELECT * FROM ' . $tabla);
        $stmt->execute();

        // Nombre de las columnas
        $result = $stmt->setFetchMode(PDO::FETCH_OBJ);
        echo
          '<tr>'
        . '    <td></td>';
        foreach($stmt->fetch() as $k=>$v)
        {
            // Ocultar o mostrar los ID de las tablas
            //$strid = substr($k, 0, 3);
            //if($strid != 'PK_' && $strid != 'FK_' && $strid != 'PFK')
            //{
            // Fin
                echo
                  '<td style="width:150px;border:1px solid black;">'
                . '    <div class="label">'
                .          $k
                . '    </div>'
                . '</td>';
            //}
        }
        echo
          '</tr>';
        // Fin

        // Contenido de la tabla
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $consulta = new TableRows(new RecursiveArrayIterator($stmt->fetchAll()));
        $consulta->setTable($tabla);
        foreach($consulta as $k=>$v)
        {
            // Ocultar o mostrar los ID de las tablas
            //$strid = substr($k, 0, 3);
            //if($strid != 'PK_' && $strid != 'FK_' && $strid != 'PFK')
            // Fin
                echo $v;
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
