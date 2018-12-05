<!doctype html>

<?php require 'PHPInclude/NegarAcceso.php'; ?>

<html>
<head>
    <?php /*require 'PHPInclude\\Head.php';*/ ?>
    <?php /*include 'PHPInclude\\Head.php';*/ ?>
    <title>Creacion - CECyTEM Tequixquiac</title>
    <!-- <link rel="stylesheet" type="text/css" href="CSSEstilos/General.css"/> -->
    <link rel="stylesheet" type="text/css" href="CSSEstilos/Administracion.css"/>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/Menu.css"/>
    <script type="text/javascript" src="JavaScriptFunciones/Menu.js"></script>
    <script type="text/javascript" src="JavaScriptFunciones/Catalogo.js"></script>
    <script type="text/javascript" src="JavaScriptFunciones/Administracion.js"></script>
    <?php include_once 'PHPFunciones\Administracion.php'; ?>
</head>

<body>
    <div id="Menu">
        <?php require 'PHPInclude/Menu.php'; ?>
        <?php /*include 'PHPInclude\\Menu.php';*/ ?>
    </div>
    <div id="Contenido" class="contenedor">
        <div class="contenido">
            <p class="encabezado">
                Plan de estudios vigente
            </p>

            <div id="tbl_especialidad">
                <button class="accordion" onclick="Acordeon()"> tbl_especialidad </button>
                <div class="panel">
                    <td colspan="100%">
                        <form>
                            <?php CrearTabla('tbl_especialidad', 'tbl_modulo'); ?>
                        </form>
                    </td>
                    <td><img src="Imagenes\Anadir.png" height="20" width="20"></td>
                </div>
                <div class="espacio"></div>
            </div>

            <div id="tbl_modulo" style="display: none;">
                <button class="accordion" onclick="Acordeon()"> tbl_modulo </button>
                <div class="panel">
                    <td colspan="100%">
                        <form>
                            <?php CrearTabla('tbl_modulo', ''); ?>
                        </form>
                    </td>
                    <td><img src="Imagenes\Anadir.png" height="20" width="20"></td>
                </div>
                <div class="espacio"></div>
            </div>

        </div>
    </div>
</body>
</html>
