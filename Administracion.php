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
        <!-- @@@@@@@@@@@@@@ BD @@@@@@@@@@@@@ -->
        <!--
            Mostrar contenido de todos los catalogos
            Añadir, eliminar y modificar elementos
            __Nombrar la direccion en la BD de todos los catalogos__
        -->
    </div>
</body>
</html>
