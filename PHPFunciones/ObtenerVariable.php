<?php
session_start();
if(!(isset($_GET['tabla']) && isset($_GET['llave'])))
{
    echo 'Error: ObtenerVariable.php';
    return;
}
$tabla = $_GET['tabla'];
$llave = $_GET['llave'];
switch($tabla)
{
    case 'tbl_plantel':
        echo 0;
        break;
    case 'tbl_usuario':
        FiltrarUsuario($llave);
        break;
    default:
        echo -1;
        break;
}

function FiltrarUsuario($llave)
{
    switch($llave)
    {
        case 'FK_id_tipo_usuario':
            echo $_SESSION['tipo_usuario'];
            break;
        default:
            echo $_SESSION['usuario'];
            break;
    }
}
?>
