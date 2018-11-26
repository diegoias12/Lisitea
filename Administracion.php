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
            <script>ButtonAccordionListener();</script>

            <div id="tbl_especialidad" class="seccion">
                <button class="accordion">
                    tbl_especialidad
                </button>
                <div class="panel">
                    <td colspan="100%">
                        <form class="tabla"></form>
                    </td>
                    <td><img onclick="AnadirElemento()" src="Imagenes/Anadir.png" height="20" width="20"></td>
                </div>
                <div class="espacio"></div>
            </div>

            <div id="tbl_modulo" class="seccion" style="display: none;">
                <script>MostrarSeccionListener('tbl_modulo', 'tbl_especialidad');</script>
                <button class="accordion" data-padre="tbl_especialidad">
                    tbl_modulo
                </button>
                <div class="panel">
                    <td colspan="100%">
                        <form class="tabla"></form>
                    </td>
                    <td><img src="Imagenes/Anadir.png" height="20" width="20"></td>
                </div>
                <div class="espacio"></div>
            </div>

            <div id="tbl_submodulo" class="seccion" style="display: none;">
                <script>MostrarSeccionListener('tbl_submodulo', 'tbl_modulo');</script>
                <button class="accordion" data-padre="tbl_modulo">
                    tbl_submodulo
                </button>
                <div class="panel">
                    <td colspan="100%">
                        <form class="tabla"></form>
                    </td>
                    <td><img src="Imagenes/Anadir.png" height="20" width="20"></td>
                </div>
                <div class="espacio"></div>
            </div>

            <div id="tbl_eje" class="seccion" style="display: none;">
                <script>MostrarSeccionListener('tbl_eje', 'tbl_submodulo');</script>
                <button class="accordion" data-padre="tbl_submodulo" data-relacion="tbl_submodulo_eje">
                    tbl_eje
                </button>
                <div class="panel">
                    <td colspan="100%">
                        <form class="tabla"></form>
                    </td>
                    <td><img src="Imagenes/Anadir.png" height="20" width="20"></td>
                </div>
                <div class="espacio"></div>
            </div>

            <div id="tbl_componente" class="seccion" style="display: none;">
                <script>MostrarSeccionListener('tbl_componente', 'tbl_eje');</script>
                <button class="accordion" data-padre="tbl_eje"> tbl_componente </button>
                <div class="panel">
                    <td colspan="100%">
                        <form class="tabla"></form>
                    </td>
                    <td><img src="Imagenes\Anadir.png" height="20" width="20"></td>
                </div>
                <div class="espacio"></div>
            </div>

            <div id="tbl_contenido_central" class="seccion" style="display: none;">
                <script>MostrarSeccionListener('tbl_contenido_central', 'tbl_componente');</script>
                <button class="accordion" data-padre="tbl_componente"> tbl_contenido_central </button>
                <div class="panel">
                    <td colspan="100%">
                        <form class="tabla"></form>
                    </td>
                    <td><img src="Imagenes\Anadir.png" height="20" width="20"></td>
                </div>
                <div class="espacio"></div>
            </div>

            <div id="tbl_contenido_especifico" class="seccion" style="display: none;">
                <script>MostrarSeccionListener('tbl_contenido_especifico', 'tbl_contenido_central');</script>
                <button class="accordion" data-padre="tbl_contenido_central" data-relacion="tbl_contenido_contenido">
                    tbl_contenido_especifico
                </button>
                <div class="panel">
                    <td colspan="100%">
                        <form class="tabla"></form>
                    </td>
                    <td><img src="Imagenes/Anadir.png" height="20" width="20"></td>
                </div>
                <div class="espacio"></div>
            </div>

            <div id="tbl_aprendizaje_esperado" class="seccion" style="display: none;">
                <script>MostrarSeccionListener('tbl_aprendizaje_esperado', 'tbl_contenido_especifico');</script>
                <button class="accordion" data-padre="tbl_contenido_especifico" data-relacion="tbl_contenido_aprendizaje">
                    tbl_aprendizaje_esperado
                </button>
                <div class="panel">
                    <td colspan="100%">
                        <form class="tabla"></form>
                    </td>
                    <td><img src="Imagenes/Anadir.png" height="20" width="20"></td>
                </div>
                <div class="espacio"></div>
            </div>

            <div id="tbl_producto_esperado" class="seccion" style="display: none;">
                <script>MostrarSeccionListener('tbl_producto_esperado', 'tbl_aprendizaje_esperado');</script>
                <button class="accordion" data-padre="tbl_aprendizaje_esperado" data-relacion="tbl_aprendizaje_producto">
                    tbl_producto_esperado
                </button>
                <div class="panel">
                    <td colspan="100%">
                        <form class="tabla"></form>
                    </td>
                    <td><img src="Imagenes/Anadir.png" height="20" width="20"></td>
                </div>
                <div class="espacio"></div>
            </div>

        </div>
    </div>
</body>
</html>
