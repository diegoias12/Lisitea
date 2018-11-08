<?php
class TableRows extends RecursiveIteratorIterator
{
    function __construct($it)
    {
        echo "<input type='radio' value='Profesional'>";
        parent::__construct($it, self::LEAVES_ONLY);
    }
    function current()
    {
        return "<td type='radio' style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
    }
    function beginChildren()
    {
        echo "<tr>";
    }
    function endChildren()
    {
        echo "</tr>" . "\n";
    }
}

function CrearTabla($tabla)
{
    echo "<table style='border: solid 1px black;'>";
    try
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "base_de_datos";

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare('SELECT * FROM ' . $tabla);
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v)
        {
            echo $v;
        }
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    echo "</table>";
}
?>
