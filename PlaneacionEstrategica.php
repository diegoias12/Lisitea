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
</head>

<body>
    <div id="Menu">
        <?php require 'PHPInclude/Menu.php'; ?>
    </div>
    <div id="Contenido">
        <h3>En curso</h3>
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
                        <div class="icono">
                            <a href="CreacionPlan.php">
                            <img src="Imagenes/DocumentoGuardado.png" alt="" style="width:118px;height:150px">
                          </a>
                        </div>
                        <div class="icono">
                            <a href="CreacionPlan.php">
                            <img src="Imagenes/DocumentoGuardado.png" alt="" style="width:118px;height:150px">
                          </a>
                        </div>
                        <div class="icono">
                            <a href="CreacionPlan.php">
                            <img src="Imagenes/DocumentoGuardado.png" alt="" style="width:118px;height:150px">
                          </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h3>Revisadas</h3>
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
                            <a href="CreacionPlan.php"><img src="Imagenes/DocumentoError.png" alt="" style="width:118px;height:150px;"></a>
                        </div>
                        <div class="icono">
                            <a href="CreacionPlan.php"><img src="Imagenes/DocumentoError.png" alt="" style="width:118px;height:150px;"></a>
                        </div>
                        <div class="icono">
                            <a href="CreacionPlan.php"><img src="Imagenes/DocumentoError.png" alt="" style="width:118px;height:150px;"></a>
                        </div>
                        <div class="icono">
                            <a href="CreacionPlan.php"><img src="Imagenes/DocumentoError.png" alt="" style="width:118px;height:150px;"></a>
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
                            <img src="Imagenes/DocumentoAceptado.png" alt="" style="width:118px;height:150px">
                            </a>
                        </div>
                        <div class="icono">
                            <a href="CreacionPlan.php">
                            <img src="Imagenes/DocumentoAceptado.png" alt="" style="width:118px;height:150px">
                            </a>
                        </div>
                        <div class="icono">
                            <a href="CreacionPlan.php">
                            <img src="Imagenes/DocumentoAceptado.png" alt="" style="width:118px;height:150px">
                            </a>
                        </div>
                        <div class="icono">
                            <a href="CreacionPlan.php">
                            <img src="Imagenes/DocumentoAceptado.png" alt="" style="width:118px;height:150px">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
