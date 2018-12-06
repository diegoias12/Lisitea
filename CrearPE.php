<!doctype html>

<?php require 'PHPInclude/NegarAcceso.php'; ?>

<html>
<head>
    <?php /*require 'PHPInclude\\Head.php';*/ ?>
    <?php /*include 'PHPInclude\\Head.php';*/ ?>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/General.css"/>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/Menu.css"/>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/Planeacion.css"/>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/VentanaEmergente.css"/>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/MenuFijo.css"/>
    <script type="text/javascript" src="JavaScriptFunciones/Menu.js"></script>
    <script type="text/javascript" src="JavaScriptFunciones/Planeacion.js"></script>
    <script type="texte/javascript" src="JavaScriptFunciones/Catalogo.js"></script>
    <script type="text/javascript" src="JavaScriptFunciones/SqlSelectElement.js"></script>
    <script type="text/javascript" src="jQueryAjax/SqlQuery.js"></script>
    <script type="text/javascript" src="jQueryAjax/ObtenerValor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <script>CargarContenido();</script>
    <div id="Menu">
        <?php require 'PHPInclude/Menu.php'; ?>
        <?php /*include 'PHPInclude\\Menu.php';*/ ?>
    </div>
    <div id="Contenido">
        <?php require 'PHPInclude/MenuPlaneacion.php';?>
        <div class="contenedor">
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
            <button class="accordion" onclick="Acordeon()">DATOS DE IDENTIFICACI&Oacute;N</button>
            <div class="panel">
                <table id="SeccionA" align="left">
                    <form action="PHPFunciones/Planeacion.php" method="post">
                        <!--Institucion-->
                        <tr>
                            <td class="Requerimiento">
                                Instituci&oacute;n:
                            </td>
                            <td colspan="6">
                                <p class="select-p" data-tabla="tbl_plantel" data-llave="VCH_institucion"></p>
                            </td>
                        </tr>
                        <!--Panel-->
                        <tr>
                          <td class="Requerimiento">
                              Plantel:                          </td>
                          <td colspan="6">
                              <p><span>Tequixquiac</span></p>
                          </td>
                        </tr>
                    </form>
                </table>
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
