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
    <link rel="stylesheet" type="text/css" href="CSSEstilos/General.css"/>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/Menu.css"/>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/Planeacion.css"/>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/VentanaEmergente.css"/>
    <script type="text/javascript" src="JavaScriptFunciones/Menu.js"></script>
    <script type="text/javascript" src="JavaScriptFunciones/Planeacion.js"></script>
    <script type="texte/javascript" src="JavaScriptFunciones/Catalogo.js"></script>
</head>

<body>
    <div id="Menu">
        <?php require 'PHPInclude/Menu.php'; ?>
        <?php /*include 'PHPInclude\\Menu.php';*/ ?>
    </div>
    <div id="Menu2">
        <?php require 'PHPInclude/Menufijo.php';?>
    </div>
    <div id="Contenido" class="contenedor" style="margin-top:50px;">
        <div class="contenido">
            <p class="encabezado">
                INSTRUMENTO PARA LA PLANEACI&Oacute;N ESTRAT&Eacute;GICA
            </p>
            <button class="accordion" onclick="Acordeon()">TIPO DE CAMPO</button>
            <div class="panel">
                <form>
                    <div class="label">
                        <input type="radio" name="campo" value="Disciplina" >Campo Disciplinar<br>
                    </div>
                    <div class="label">
                        <input type="radio" name="campo" value="Profesional">Campo Profesional<br>
                    </div>
                </form>
            </div>
            <p class="encabezado">
                PLANEACI&Oacute;N ESTRATEGICA
            </p>
            <button class="accordion" onclick="Acordeon()">Datos De identificaci&oacute;n</button>
            <div class="panel">
              <form action="/action_page.php" style="min-width:500px;margin:auto">
                  <div class="input-container">
                      <button type="button" class="btn">verga</button>
                      <input class="input-field" type="text" placeholder="Username" name="usrnm">
                      <button type="button" class="btn">verga</button>
                      <input class="input-field" type="text" placeholder="Username" name="usrnm">
                  </div>
                  <div class="input-container">
                      <button type="button" class="btn">verga</button>
                      <input class="input-field" type="text" placeholder="Email" name="email">
                  </div>
                  <div class="input-container">
                      <button type="button" class="btn">verga</button>
                      <input class="input-field" type="password" placeholder="Password" name="psw">
                  </div>
                  <button type="submit" class="btn">Register</button>
              </form>
          </div>
        </div>
    </div>
    <script>
        AgregarCodigo();
    </script>
    <script>
        function Acordeon()
        {
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++)
            {
                acc[i].onclick= function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.display === "block")
                    {
                        panel.style.display = "none";
                    }
                    else
                    {
                        panel.style.display = "block";
                    }
                };
            }
        }
    </script>
  </body>
  </html>
