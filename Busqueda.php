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
        <div>
            <!-- @@@@@@@@@@@@@@@ Diseño @@@@@@@@@@@@  -->
            <!--
                Label:              ComboBox
                ****************************
                Materia
                    Campo
                    Disciplina
                    Asignatura
                Profesor
                Semestre
                Año
            -->
            <!-- @@@@@@@@@@@@@@ BD @@@@@@@@@@@@@ -->
            <!--
                Mostrar los elementos de cada ComboBox
                Materia
                Profesor
                Semestre
                Año
            -->
        </div>
        <hr>
        <div class="Planeaciones">
        </div>
    </div>
</body>
</html>
