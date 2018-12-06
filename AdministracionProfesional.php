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
        <script>Activa(2);</script>
        <div class="contenedor">
            <div class="contenido">
            <p class="encabezado">
                Plan de estudios vigente
            </p>
            <div id="tbl_campo_disciplinar" class="seccion">
            </div>

            <div id="tbl_asignatura"
            data-padre="tbl_campo_disciplinar"
            class="seccion" style="display: none;">
            </div>

            <div id="tbl_eje"
            data-padre="tbl_asignatura"
            data-relacion="tbl_asignatura_eje"
            class="seccion" style="display: none;">
            </div>

            <div id="tbl_componente"
            data-padre="tbl_eje"
            class="seccion" style="display: none;">
            </div>

            <div id="tbl_contenido_central"
            data-padre="tbl_componente"
            class="seccion" style="display: none;">
            </div>

            <!-- tbl_contenido_especifico tbl_contenido_central tbl_contenido_contenido -->
            <div id="tbl_contenido_especifico"
            data-padre="tbl_contenido_central"
            data-relacion="tbl_contenido_contenido"
            class="seccion" style="display: none;">
            </div>

            <!-- tbl_aprendizaje_esperado tbl_contenido_especifico tbl_contenido_aprendizaje -->
            <div id="tbl_aprendizaje_esperado"
            data-padre="tbl_contenido_especifico"
            data-relacion="tbl_contenido_aprendizaje"
            class="seccion" style="display: none;">
            </div>

            <!-- tbl_producto_esperado tbl_aprendizaje_esperado tbl_aprendizaje_producto-->
            <div id="tbl_producto_esperado"
            data-padre="tbl_aprendizaje_esperado"
            data-relacion="tbl_aprendizaje_producto"
            class="seccion" style="display: none;">
            </div>

            </div>
        </div>
    </div>
</body>
</html>
