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
    <script type="text/javascript" src="JavaScriptFunciones/IniciarPagina.js"></script>
    <script type="text/javascript" src="jQueryAjax/SqlQuery.js"></script>
    <script type="text/javascript" src="jQueryAjax/SeccionAdministracion.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <script>IniciarAdministracionDisciplinar();</script>
    <!--Menu lateral-->
    <div id = "Menu">
        <?php require "PHPInclude/Menu.php"; ?>
        <?php /*include 'PHPInclude\\Menu.php';*/ ?>
    </div>
    <div id="Contenido">
        <?php require "PHPInclude/MenuAdministracion.php"; ?>
        <script>Activa(3);</script>
        <div class="contenedor">
            <div class="contenido">
            <p class="encabezado">
                Plan de estudios vigente
            </p>
            <!-- tbl tipo Competencia-->
            <div id = "tbl_tipo_competencia" class="seccion">
            </div>
            <div id = "tbl_competencia"
            data-padre = "tbl_tipo_competencia"
            class="seccion" style="display: none;">
            </div>
            <hr>
            <!-- tbl_habilidad_sociemocional '' -->
            <div id="tbl_habilidad_socioemocional" class="seccion parar">
            </div>
            <hr>
            <!-- tbl_marzano-->
            <div id="tbl_nivel" class="seccion parar" >
            </div>
            <div id="tbl_verbo_marzano"
            data-padre = "tbl_nivel"
            class="seccion" style="display:none;">
            </div>
            </div>
        </div>
    </div>
</body>
</html>
