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
    <link rel="stylesheet" type="text/css" href="CSSEstilos/Administracion.css"/>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/Menu.css"/>
    <script type="text/javascript" src="JavaScriptFunciones/Menu.js"></script>
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
            <button class="accordion">Tipo de campo</button>
            <div class="panel">
                <form>
                    <div class="label">
                        <input type="radio" value="Disciplina" >Campo Disciplinar<br>
                    </div>
                    <div class="label">
                        <input type="radio" value="Profesional">Campo Profesional<br>
                    </div>
                </form>
            </div>
            <div class="espacio"></div>
            <button class="accordion">Especialidad</button>
            <div class="panel">
                <td colspan="100%">
                    <form method="get">
                            <?php
                                include_once 'PHPFunciones\Administracion.php';
                                CrearTabla('tbl_especialidad','vch_nombre');
                              ?>
                      </form>
                </td>
                <td><img src="Imagenes\Anadir.png" height="20" width="20"></td>
            </div>
            <div class="espacio"></div>
            <button class="accordion">Disciplina/Modulo</button>
            <div class="panel">
                <td colspan="100%">
                    <form method="get">
                        <?php
                        include_once 'PHPFunciones\Administracion.php';
                        CrearTabla('tbl_campo_disciplinar','vch_nombre');
                        ?>
                    </form>
                </td>
                <td><img src="Imagenes\Anadir.png" height="20" width="20"></td>
            </div>
            <div class="espacio"></div>
      			<button class="accordion">Asignatura/SubModulo</button>
            <div class="panel">
                <td colspan="100%">
                    <form method="get">
                              <?php
                              include_once 'PHPFunciones\Administracion.php';
                              CrearTabla('tbl_modulo','vch_nombre');
                              ?>
                    </form>
                  </td>
                  <td><img src="Imagenes\Anadir.png" height="20" width="20"></td>
            </div>
            <div class="espacio"></div>
      			<button class="accordion">Eje</button>
            <div class="panel">
                <td colspan="100%">
                    <form method="get">
                              <?php
                              include_once 'PHPFunciones\Administracion.php';
                              CrearTabla('tbl_submodulo','vch_nombre');
                              ?>
                      </form>
                  </td>
                  <td><img src="Imagenes\Anadir.png" height="20" width="20"></td>
            </div>
            <div class="espacio"></div>
      			<button class="accordion">Componentes</button>
            <div class="panel">
                <td colspan="100%">
                    <form method="get">
                              <?php
                              include_once 'PHPFunciones\Administracion.php';
                              CrearTabla('tbl_eje','vch_descripcion');
                              ?>
                    </form>
                </td>
                <td><img src="Imagenes\Anadir.png" height="20" width="20"></td>
            </div>
            <div class="espacio"></div>
      			<button class="accordion">Contenido central</button>
            <div class="panel">
                <td colspan="100%">
                    <form method="get">
                              <?php
                              include_once 'PHPFunciones\Administracion.php';
                              CrearTabla('tbl_componente','vch_descripcion');
                              ?>
                    </form>
                </td>
                <td><img src="Imagenes\Anadir.png" height="20" width="20"></td>
            </div>
        </div>
    </div>
</body>
</html>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}
</script>
