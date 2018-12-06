<!doctype html>

<?php require 'PHPInclude/NegarAcceso.php'; ?>

<html>
<head>
    <link rel="icon" href="Imagenes/Lisitea.png">
    <?php /*require 'PHPInclude\\Head.php';*/ ?>
    <?php /*include 'PHPInclude\\Head.php';*/ ?>
    <title>Creacion - CECyTEM Tequixquiac</title>
    <!-- <link rel="stylesheet" type="text/css" href="CSSEstilos/General.css"/> -->
    <link rel="stylesheet" type="text/css" href="CSSEstilos/Administracion.css"/>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/Menu.css"/>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/MenuFijo.css"/>
    <script type="text/javascript" src="JavaScriptFunciones/Menu.js"></script>
    <script type="text/javascript" src="JavaScriptFunciones/Administracion.js"></script>
    <script type="text/javascript" src="JavaScriptFunciones/ImgAccion.js"></script>
    <script type="text/javascript" src="jQueryAjax/SqlQuery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <!--Menu lateral-->
    <div id = "Menu">
        <?php require "PHPInclude/Menu.php"; ?>
        <?php /*include 'PHPInclude\\Menu.php';*/ ?>
    </div>
    <div id="Contenido">
        <?php require "PHPInclude/MenuAdministracion.php"; ?>
        <script>Activa(2);</script>
    </div>
</body>
</html>
