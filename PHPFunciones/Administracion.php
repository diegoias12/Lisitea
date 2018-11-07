<?php
function CrearTabla($tabla,$campo)
{
    $conn = mysqli_connect("localhost", "root", "", "base_de_datos");
    if (!$conn)
	{
		die("Conexion Fallida: " . mysqli_connect_error());
	}

	$sql = 'SELECT ' . $campo
         . ' FROM ' . $tabla;
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0)
    {
        $elementos = '';
        while($row = mysqli_fetch_assoc($result))
        {
            $elementos .=
              '<input type="radio">'
            . $row[$campo]
            . '<a href="PHPFunciones\Planeacion.php?editar=true">'
            .     '<img src="Imagenes\Editar.png" style="float:right;height:18px;width:18px">'
            . '</a>'
            . '<a href="PHPFunciones\Planeacion.php?eliminar=true">'
            .     '<img src="Imagenes\Eliminar.png" style="float:right;height:18px;width:18px">'
            . '</a>'
            . '<br>'
            ;
        }
    }
    echo $elementos;
    mysqli_close($conn);
}
?>
