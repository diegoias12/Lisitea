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
    <link rel="stylesheet" type="text/css" href="CSSEstilos/InicioPE.css"/>
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
        <div class="caja">
            <div class="caja-ancho">
                <div class="encabezado">
                    <div class="label">
                        Abrir una Planeacion Estrategica
                    </div>
                </div>
                <div class="contenedor">
                    <div class="seccion">
                        <div class="icono">
                            <a href="CreacionPlan.php">
                            <img src="Imagenes/Nuevodoc.png" alt="" style="width:118px;height:150px">
                          </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h3>Revisadas</h3>
        <!-- @@@@@@@@@ BD @@@@@@@@@ -->
        <!--
            Planeaciones validadas del periodo en curso
        -->
        <div class="caja">
            <div class="caja-ancho">
                <div class="encabezado">
                    <div class="label">
                        Abrir una Planeacion Estrategica
                    </div>
                </div>
                <div class="contenedor">
                    <div class="seccion">
                        <div class="icono">
                            <a href="CreacionPlan.php">
                            <img src="Imagenes/Nuevodoc.png" alt="" style="width:118px;height:150px">
                          </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h3>Historial</h3>
        <!-- @@@@@@@@@ BD @@@@@@@@@ -->
        <!--
            El resto de planeaciones hechas por el usuario
        -->
        <div class="caja">
            <div class="caja-ancho">
                <div class="encabezado">
                    <div class="label">
                        Abrir una Planeacion Estrategica
                    </div>
                </div>
                <div class="contenedor">
                    <div class="seccion">
                        <div class="icono">
                            <a href="CreacionPlan.php">
                            <img src="Imagenes/Nuevodoc.png" alt="" style="width:118px;height:150px">
                          </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
