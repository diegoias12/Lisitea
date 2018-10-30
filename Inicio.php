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
    <title>Creacion - CECyTEM Tequixquiac</title>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/General.css"/>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/Menu.css"/>
    <script type="text/javascript" src="JavaScriptFunciones/Menu.js"></script>
    <script type="text/javascript" src="JavaScriptFunciones/Planeacion.js"></script>
</head>

<body>
    <div id="Menu">
        <?php require 'PHPInclude/Menu.php'; ?>
    </div>
    <div id="Contenido">
        <a href="CreacionPlan.php"><button>Nuevo</button></a>
        <!-- @@@@@@@@@ Programador @@@@@@@@ -->
        <!--
            El botón "Nuevo" debe crear una una ID para la nueva planeación
            y todo lo que correspondiente a ella
            Manda al modo "Edición"

            Al dar clic en una planeación, mandarte al "Modo Vista"
            O al modo "Edición" en casa de estar en "En curso"
        -->
        <!-- @@@@@@@@@ Diseño @@@@@@@@@ -->
        <!--
            Mostrar rectangulos verticales representado las planeaciones
            (Podría mostrar la primer página)
            Debajo de él:
                Título (Materia)
        -->
        <h3>En curso</h3>
        <!-- @@@@@@@@@ BD @@@@@@@@@ -->
        <!--
            Aquellas planeaciones que no hayan sido validadas
        -->
        <hr>
        <h3>Revisadas</h3>
        <!-- @@@@@@@@@ BD @@@@@@@@@ -->
        <!--
            Planeaciones validadas del periodo en curso
        -->
        <hr>
        <h3>Historial</h3>
        <!-- @@@@@@@@@ BD @@@@@@@@@ -->
        <!--
            El resto de planeaciones hechas por el usuario
        -->
        <hr>
    </div>
</body>
</html>
