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
            <button class="accordion" onclick="Acordeon()">Tipo de campo</button>
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

            <button class="accordion" onclick="Acordeon()">Especialidad</button>
            <div class="panel">
                <td colspan="100%">
                    <form method="get">
                            <?php CrearTabla('tbl_especialidad'); ?>
                      </form>
                </td>
                <td><img src="Imagenes\Anadir.png" height="20" width="20"></td>
            </div>

            <div class="espacio"></div>

            <button class="accordion" onclick="Acordeon()">Disciplina/Modulo</button>
            <div class="panel">
                <td colspan="100%">
                    <form>
                        <?php CrearTabla('tbl_campo_disciplinar'); ?>
                    </form>
                </td>
                <td><img src="Imagenes\Anadir.png" height="20" width="20"></td>
            </div>

            <div class="espacio"></div>

      		<button class="accordion" onclick="Acordeon()">Asignatura/SubModulo</button>
            <div class="panel">
                <td colspan="100%">
                    <form method="get">
                              <?php CrearTabla('tbl_modulo'); ?>
                    </form>
                  </td>
                  <td><img src="Imagenes\Anadir.png" height="20" width="20"></td>
            </div>

            <div class="espacio"></div>

      		<button class="accordion" onclick="Acordeon()">Eje</button>
            <div class="panel">
                <td colspan="100%">
                    <form method="get">
                              <?php CrearTabla('tbl_submodulo'); ?>
                      </form>
                  </td>
                  <td><img src="Imagenes\Anadir.png" height="20" width="20"></td>
            </div>

            <div class="espacio"></div>

      		<button class="accordion" onclick="Acordeon()">Componentes</button>
            <div class="panel">
                <td colspan="100%">
                    <form method="get">
                              <?php CrearTabla('tbl_eje'); ?>
                    </form>
                </td>
                <td><img src="Imagenes\Anadir.png" height="20" width="20"></td>
            </div>

            <div class="espacio"></div>

      		<button class="accordion" onclick="Acordeon()">Contenido central</button>
            <div class="panel">
                <td colspan="100%">
                    <form method="get">
                        <?php CrearTabla('tbl_componente'); ?>
                    </form>
                </td>
                <td><img src="Imagenes\Anadir.png" height="20" width="20"></td>
            </div>
        </div>
    </div>
</body>
</html>
