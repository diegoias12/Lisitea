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
        <script>Activa(5);</script>
        <div class="contenedor">
              <div class="contenido">
                  <p class="encabezado">
                      Plan de estudios vigente
                  </p>
                  <script>AccordionListener();</script>
                  <script>ImgAccionListener();</script>

                  <!-- class="seccion" es para encontrar con facilidad el id del bloque -->
                  <div id="tbl_especialidad" class="seccion">
                      <!-- class="accordion" es la clase que fue creada originalmente
                          para <button>tbl_nombre</button>, pero se movio de esta forma
                          para facilitar la funcionalidad de img.accion -->
                      <div class="accordion">
                          <span>
                              tbl_especialidad
                          </span>
                          <!-- Estos botones son usados para modificar la
                              informacion de la tabla -->
                          <?php require "PHPInclude/ImgAccion.php"; ?>
                      </div>
                      <!-- En esta area es mostrada la tabla de la BD -->
                      <div class="panel">
                          <td colspan="100%">
                              <form class="tabla"></form>
                          </td>
                      </div>
                      <!-- Se crea un espacio un tanto elegante :v -->
                      <div class="espacio"></div>
                  </div>

                  <div id="tbl_modulo" class="seccion" style="display: none;">
                      <!-- Con estos listeners, las tablas serán mostradas cuando
                          se seleccione alguno de los elementos de su "padre" -->
                      <script>MostrarSeccionListener('tbl_modulo', 'tbl_especialidad');</script>
                      <div class="accordion">
                          <!-- Se manda informacion en el mismo boton -->
                          <span data-padre="tbl_especialidad">
                              tbl_modulo
                          </span>
                          <?php require "PHPInclude/ImgAccion.php"; ?>
                      </div>
                      <div class="panel">
                          <td colspan="100%">
                              <form class="tabla"></form>
                          </td>
                      </div>
                      <div class="espacio"></div>
                  </div>

                  <div id="tbl_submodulo" class="seccion" style="display: none;">
                      <script>MostrarSeccionListener('tbl_submodulo', 'tbl_modulo');</script>
                      <div class="accordion">
                          <span data-padre="tbl_modulo">
                              tbl_submodulo
                          </span>
                          <?php require "PHPInclude/ImgAccion.php"; ?>
                      </div>
                      <div class="panel">
                          <td colspan="100%">
                              <form class="tabla"></form>
                          </td>
                      </div>
                      <div class="espacio"></div>
                  </div>

                  <div id="tbl_eje" class="seccion" style="display: none;">
                      <script>MostrarSeccionListener('tbl_eje', 'tbl_submodulo');</script>
                      <div class="accordion">
                          <span data-padre="tbl_submodulo" data-relacion="tbl_submodulo_eje">
                              tbl_eje
                          </span>
                          <?php require "PHPInclude/ImgAccion.php"; ?>
                      </div>
                      <div class="panel">
                          <td colspan="100%">
                              <form class="tabla"></form>
                          </td>
                      </div>
                      <div class="espacio"></div>
                  </div>

                  <div id="tbl_componente" class="seccion" style="display: none;">
                      <script>MostrarSeccionListener('tbl_componente', 'tbl_eje');</script>
                      <div class="accordion">
                          <span data-padre="tbl_eje">
                              tbl_componente
                          </span>
                          <?php require "PHPInclude/ImgAccion.php"; ?>
                      </div>
                      <div class="panel">
                          <td colspan="100%">
                              <form class="tabla"></form>
                          </td>
                      </div>
                      <div class="espacio"></div>
                  </div>

                  <div id="tbl_contenido_central" class="seccion" style="display: none;">
                      <script>MostrarSeccionListener('tbl_contenido_central', 'tbl_componente');</script>
                      <div class="accordion">
                          <span data-padre="tbl_componente">
                              tbl_contenido_central
                          </span>
                          <?php require "PHPInclude/ImgAccion.php"; ?>
                      </div>
                      <div class="panel">
                          <td colspan="100%">
                              <form class="tabla"></form>
                          </td>
                      </div>
                      <div class="espacio"></div>
                  </div>

                  <div id="tbl_contenido_especifico" class="seccion" style="display: none;">
                      <script>MostrarSeccionListener('tbl_contenido_especifico', 'tbl_contenido_central');</script>
                      <div class="accordion">
                          <span data-padre="tbl_contenido_central" data-relacion="tbl_contenido_contenido">
                              tbl_contenido_especifico
                          </span>
                          <?php require "PHPInclude/ImgAccion.php"; ?>
                      </div>
                      <div class="panel">
                          <td colspan="100%">
                              <form class="tabla"></form>
                          </td>
                      </div>
                      <div class="espacio"></div>
                  </div>

                  <div id="tbl_aprendizaje_esperado" class="seccion" style="display: none;">
                      <script>MostrarSeccionListener('tbl_aprendizaje_esperado', 'tbl_contenido_especifico');</script>
                      <div class="accordion">
                          <span data-padre="tbl_contenido_especifico" data-relacion="tbl_contenido_aprendizaje">
                              tbl_aprendizaje_esperado
                          </span>
                          <?php require "PHPInclude/ImgAccion.php"; ?>
                      </div>
                      <div class="panel">
                          <td colspan="100%">
                              <form class="tabla"></form>
                          </td>
                      </div>
                      <div class="espacio"></div>
                  </div>

                  <div id="tbl_producto_esperado" class="seccion" style="display: none;">
                      <script>MostrarSeccionListener('tbl_producto_esperado', 'tbl_aprendizaje_esperado');</script>
                      <div class="accordion">
                          <span data-padre="tbl_aprendizaje_esperado" data-relacion="tbl_aprendizaje_producto">
                              tbl_producto_esperado
                          </span>
                          <?php require "PHPInclude/ImgAccion.php"; ?>
                      </div>
                      <div class="panel">
                          <td colspan="100%">
                              <form class="tabla"></form>
                          </td>
                      </div>
                      <div class="espacio"></div>
                  </div>

                </div>
            </div>
    </div>
</body>
</html>
