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
            <script>AccordionListener();</script>
            <script>ImgAccionListener();</script>

            <!-- class="seccion" es para encontrar con facilidad el id del bloque -->
            <div id="tbl_especialidad" class="seccion">
                <!-- class="accordion" es la clase que fue creada originalmente
                    para <button>tbl_nombre</button>, pero se movio de esta forma
                    para facilitar la funcionalidad de img.accion -->
                <div class="accordion">
                    <span>tbl_especialidad</span>
                    <!-- Estos botones son usados para modificar la
                        informacion de la tabla -->
                    <img src="Imagenes/Cancelar.png" class="accion">    <!-- 0 -->
                    <img src="Imagenes/Anadir.png" class="accion">      <!-- 1 -->
                    <img src="Imagenes/Eliminar.png" class="accion">    <!-- 2 -->
                    <img src="Imagenes/Editar.png" class="accion">      <!-- 3 -->
                    <img src="Imagenes/Todo.png" class="accion">        <!-- 4 -->
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
                    <span data-padre="tbl_especialidad">tbl_modulo</span>
                    <img src="Imagenes/Cancelar.png" class="accion">    <!-- 0 -->
                    <img src="Imagenes/Anadir.png" class="accion">      <!-- 1 -->
                    <img src="Imagenes/Eliminar.png" class="accion">    <!-- 2 -->
                    <img src="Imagenes/Editar.png" class="accion">      <!-- 3 -->
                    <img src="Imagenes/Todo.png" class="accion">
                </div>
                <div class="panel">
                    <td colspan="100%">
                        <form class="tabla"></form>
                    </td>
                    <td><img src="Imagenes/Anadir.png" class="accion"></td>
                </div>
                <div class="espacio"></div>
            </div>

            <!--

            <div id="tbl_submodulo" class="seccion" style="display: none;">
                <script>MostrarSeccionListener('tbl_submodulo', 'tbl_modulo');</script>
                <button class="accordion" data-padre="tbl_modulo">
                    tbl_submodulo
                </button>
                <div class="panel">
                    <td colspan="100%">
                        <form class="tabla"></form>
                    </td>
                    <td><img src="Imagenes/Anadir.png" class="accion"></td>
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
                    <td><img src="Imagenes/Anadir.png" class="accion"></td>
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
                    <td><img src="Imagenes\Anadir.png" class="accion"></td>
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
                    <td><img src="Imagenes\Anadir.png" class="accion"></td>
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
                    <td><img src="Imagenes/Anadir.png" class="accion"></td>
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
                    <td><img src="Imagenes/Anadir.png" class="accion"></td>
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
                    <td><img src="Imagenes/Anadir.png" class="accion"></td>
                </div>
                <div class="espacio"></div>
            </div>

            -->

        </div>
    </div>
</body>
</html>
