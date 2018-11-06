<?php
function CrearTabla($tabla)
{
    $conn = mysqli_connect("localhost", "root", "", "base_de_datos");
    if (!$conn)
	{
		die("Conexion Fallida: " . mysqli_connect_error());
	}
    $sql = 'SELECT VCH_nombre '
         . 'FROM ' . $tabla;
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0)
    {
        $elementos = '';
        while($row = mysqli_fetch_assoc($result))
        {
            $elementos .=
              '<input type="checkbox">'
            . $row['VCH_nombre']
            . '<a href="PHPFunciones\Planeacion.php?editar=true">'
            .     '<img src="Imagenes\Editar.png" height="40" width="40">'
            . '</a>'
            . '<a href="PHPFunciones\Planeacion.php?eliminar=true">'
            .     '<img src="Imagenes\Eliminar.png" height="40" width="40">'
            . '</a>'
            . '<br>'
            ;
        }
    }
    echo $elementos;
    mysqli_close($conn);
}
?>
