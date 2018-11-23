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
    <!-- <link rel="stylesheet" type="text/css" href="CSSEstilos/General.css"/> -->
    <link rel="stylesheet" type="text/css" href="CSSEstilos/Administracion.css"/>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/Menu.css"/>
    <script type="text/javascript" src="JavaScriptFunciones/Menu.js"></script>
    <script type="text/javascript" src="JavaScriptFunciones/Catalogo.js"></script>
    <script type="text/javascript" src="JavaScriptFunciones/Administracion.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

            <!-- <button onclick="myFun()">Try it</button> -->

            <div id="tbl_especialidad">
                <button class="accordion" onclick="Acordeon();"> tbl_especialidad </button>
                <div class="panel">
                    <td colspan="100%">
                        <form>
                            <?php CrearTabla('tbl_especialidad', ''); ?>
                            <script>
                            AddRadioBtnListeners('tbl_especialidad', '');
                            </script>
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
                            <?php CrearTabla('tbl_modulo', 'tbl_especialidad'); ?>
                            <script>
                            AddRadioBtnListeners('tbl_modulo', 'tbl_especialidad');
                            </script>
                        </form>
                    </td>
                    <td><img src="Imagenes\Anadir.png" height="20" width="20"></td>
                </div>
                <div class="espacio"></div>
            </div>

            <div id="tbl_submodulo" style="display: none;">
                <button class="accordion" onclick="Acordeon()"> tbl_submodulo </button>
                <div class="panel">
                    <td colspan="100%">
                        <form>
                            <?php CrearTabla('tbl_submodulo', 'tbl_modulo'); ?>
                            <script>
                            AddRadioBtnListeners('tbl_submodulo', 'tbl_modulo');
                            </script>
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
