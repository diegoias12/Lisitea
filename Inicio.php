<!doctype html>

<?php require 'PHPInclude/NegarAcceso.php'; ?>

<html>
<head>
    <title>Creacion - CECyTEM Tequixquiac</title>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/General.css"/>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/Menu.css"/>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/InicioPE.css"/>
    <script type="text/javascript" src="JavaScriptFunciones/Menu.js"></script>
    <script type="text/javascript" src="JavaScriptFunciones/Planeacion.js"></script>
    <script type="text/javascript" src="JavaScriptFunciones/SqlSelectElement.js"></script>
    <script type="text/javascript" src="jQueryAjax/ObtenerValor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <div id="Menu">
        <?php require 'PHPInclude/Menu.php'; ?>
    </div>
    <script>FiltrarMenu('tbl_usuario','FK_id_tipo_usuario')</script>
    <div id="Contenido">

    </div>
    <!-- En cso de requerir un cambio de contraseña
    <div id="Menu2">
        <?php //require 'PHPInclude/SolicitarCambioContraseña.php'; ?>
    </div>
    -->
</body>
</html>
