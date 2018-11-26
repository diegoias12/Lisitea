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
    <script type="text/javascript" src="JavaScriptFunciones/Administracion.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

            <div id="tbl_especialidad" class="seccion">
                <button class="accordion"> tbl_especialidad </button>
                <div class="panel">
                    <td colspan="100%">
                        <form class="tabla"></form>
                    </td>
                    <td>
                        <a onclick="AnadirElemento('tbl_especialidad', '')">
                            <img src="Imagenes/Anadir.png" height="20" width="20">
                        </a>
                    </td>
                </div>
                <div class="espacio"></div>
            </div>

            <div id="tbl_modulo" class="seccion" style="display: none;">
                <script>RadioBtnListener('tbl_modulo', 'tbl_especialidad');</script>
                <button class="accordion"> tbl_modulo </button>
                <div class="panel">
                    <td colspan="100%">
                        <form class="tabla"></form>
                    </td>
                    <td><img src="Imagenes/Anadir.png" height="20" width="20"></td>
                </div>
                <div class="espacio"></div>
            </div>

            <div id="tbl_submodulo" class="seccion" style="display: none;">
                <script>RadioBtnListener('tbl_submodulo', 'tbl_modulo');</script>
                <button class="accordion"> tbl_submodulo </button>
                <div class="panel">
                    <td colspan="100%">
                        <form class="tabla"></form>
                    </td>
                    <td><img src="Imagenes/Anadir.png" height="20" width="20"></td>
                </div>
                <div class="espacio"></div>
            </div>

            <div id="tbl_eje" class="seccion" style="display: none;">
                <script>RadioBtnListenerNM('tbl_eje', 'tbl_submodulo', 'tbl_submodulo_eje')</script>
                <button class="accordion"> tbl_eje </button>
                <div class="panel">
                    <td colspan="100%">
                        <form class="tabla"></form>
                    </td>
                    <td><img src="Imagenes/Anadir.png" height="20" width="20"></td>
                </div>
                <div class="espacio"></div>
            </div>

            <!--

            <div id="tbl_componente" style="display: none;">
                <button class="accordion" onclick="CrearTabla('tbl_componente');"> tbl_componente </button>
                <div class="panel">
                    <td colspan="100%">
                        <form>
                            <script>
                            AddRadioBtnListeners('tbl_componente', 'tbl_eje');
                            </script>
                        </form>
                    </td>
                    <td><img src="Imagenes\Anadir.png" height="20" width="20"></td>
                </div>
                <div class="espacio"></div>
            </div>

            <div id="tbl_cont_central" style="display: none;">
                <button class="accordion" onclick="CrearTabla('tbl_cont_central');"> tbl_cont_central </button>
                <div class="panel">
                    <td colspan="100%">
                        <form>
                            <script>
                            AddRadioBtnListeners('tbl_cont_central', 'tbl_componente');
                            </script>
                        </form>
                    </td>
                    <td><img src="Imagenes\Anadir.png" height="20" width="20"></td>
                </div>
                <div class="espacio"></div>
            </div>

            <div id="tbl_contenido_contenido" style="display: none;">
                <button class="accordion" onclick="CrearTabla('tbl_contenido_contenido');"> tbl_contenido_contenido </button>
                <div class="panel">
                    <td colspan="100%">
                        <form></form>
                    </td>
                    <td><img src="Imagenes\Anadir.png" height="20" width="20"></td>
                </div>
                <div class="espacio"></div>
            </div>

            <div id="tbl_cont_especifico" style="display: none;">
                <button class="accordion" onclick="CrearTabla('tbl_cont_especifico');"> tbl_cont_especifico </button>
                <div class="panel">
                    <td colspan="100%">
                        <form>
                            <script>
                            AddRadioBtnListenersNM('tbl_cont_especifico', 'tbl_cont_central', 'tbl_contenido_contenido');
                            </script>
                        </form>
                    </td>
                    <td><img src="Imagenes\Anadir.png" height="20" width="20"></td>
                </div>
                <div class="espacio"></div>
            </div>

            -->

        </div>
    </div>
</body>
</html>
