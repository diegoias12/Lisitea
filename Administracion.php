<!doctype html>

<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false)
    {
        header("Location: index.php");
    }
?>

<html>
<head>
    <?php /*require 'PHPInclude\\Head.php';*/ ?>
    <?php /*include 'PHPInclude\\Head.php';*/ ?>
    <title>Creacion - CECyTEM Tequixquiac</title>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/General.css"/>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/Menu.css"/>
    <script type="text/javascript" src="JavaScriptFunciones/Menu.js"></script>
</head>

<body>
    <div id="Menu">
        <?php require 'PHPInclude/Menu.php'; ?>
        <?php /*include 'PHPInclude\\Menu.php';*/ ?>
    </div>
    <div id="Contenido">
        <!-- @@@@@@@@@@@@@@@ Diseño @@@@@@@@@@@@  -->
        <!--
            Nombre del catalogo                             /Despegable/
                        /Nuevo/ /Seleccionar todo/ /Borrar seleccionados/
            /Checkbox/ Contendio                        /Editar/ /Borrar/
            /Checkbox/ Contendio                        /Editar/ /Borrar/
            /Checkbox/ Contendio                        /Editar/ /Borrar/
            ***********************
            Se tendrá este formato para todos los catalogos
        -->
        <table bgcolor="#00FF00">
            <tr>
                <td colspan="100%">Nombre<td>
            </tr>
            <tr>
                <td><img src="Imagenes\Eliminar.png" height="40" width="40"></td>
                <td><img src="Imagenes\Anadir.png" height="40" width="40"></td>
                <td><img src="Imagenes\Todo.png" height="40" width="40"></td>
            </tr>
            <tr>
                <td colspan="100%">
                    <form method="get">
                        <a href='PHPFunciones\Administracion.php?tabla=TBL_Campo_disciplinar'>Descargar</a>
                    </form>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
