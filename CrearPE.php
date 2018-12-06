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
    <script type="texte/javascript" src="JavaScriptFunciones/Catalogo.js"></script>
    <script type="text/javascript" src="JavaScriptFunciones/IniciarPagina.js"></script>
    <script type="text/javascript" src="jQueryAjax/SqlQuery.js"></script>
    <script type="text/javascript" src="jQueryAjax/ObtenerValor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <script>IniciarCreacionPlan();</script>
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
                        <!--Fila - Institucion-->
                        <tr>
                            <td class="Requerimiento">
                                Instituci&oacute;n:
                            </td>
                            <td colspan="6">
                                <p class="select-p" data-tabla="tbl_plantel" data-llave="VCH_institucion"></p>
                            </td>
                        </tr>
                        <!--Fila - Plantel-->
                        <tr>
                            <td class="Requerimiento">
                                Plantel:
                            </td>
                            <td colspan="6">
                                <p class="select-p" data-tabla="tbl_plantel" data-llave="VCH_plantel"></p>
                            </td>
                        </tr>
                        <!--Fila - CCT - Docente -->
                        <tr>
                            <!--CCT-->
                            <td class="Requerimiento">
                                CCT:
                            </td>
                            <td width="130px">
                                <p class="select-p" data-tabla="tbl_plantel" data-llave="VCH_CCT"></p>
                            </td>
                            <td class="Requerimiento" colspan="2">
                                Docente:
                            </td>
                            <td width="140px">
                                <p class="select-p" data-tabla="tbl_usuario" data-llave="VCH_nombre"></p>
                            </td>
                            <td width="140px">
                                <p class="select-p" data-tabla="tbl_usuario" data-llave="VCH_ap_paterno"></p>
                            </td>
                            <td width="140px">
                                <p class="select-p" data-tabla="tbl_usuario" data-llave="VCH_ap_materno"></p>
                            </td>
                        </tr>
                        <!-- Fila - Asignatura Especialidad Semestre NoParcial NoPlaneacion -->
                        <tr>
                            <!-- Asignatura -->
                            <td class="Requerimiento" rowspan="2">
                                Asignatura
                            </td>
                            <td class="combobox">
                                <select class="select-cb"
                                data-tabla="tbl_campo_disciplinar" data-llave="VCH_nombre" style="width:138px;height:50px;font-size:16px">
                                </select>
                            </td>
                            <!-- Especialidad -->
                            <td class="Requerimiento" colspan="2" >
                                Especialidad:
                            </td>
                            <!-- Semestre -->
                            <td class="Requerimiento">
                                Semestre:
                            </td>
                            <!-- NoParcial -->
                            <td class="Requerimiento" style="font-size:12px">
                                N&uacute;mero de parcial donde aplicar&aacute;:
                            </td>
                            <!-- NoPlaneacion -->
                            <td class="Requerimiento" style="font-size:12px">
                                N&uacute;mero de planeaci&oacute;n:
                            </td>
                        </tr>
                        <!-- Fila -->
                        <tr>
                          <!-- Contenido - tbl_asignatura VCH_nombre -->
                          <td class="combobox">
                              <select class="select-cb" style="height:62px;width:138px;"
                                  data-tabla="tbl_asignatura" data-llave="VCH_nombre"
                                  disabled>
                              </select>
                          </td>
                          <!-- Contenido - tbl_especialidad VCH_nombre -->
                          <td class="select-ch" colspan="2"
                          data-tabla="tbl_especialidad"
                          data-llave="VCH_nombre">
                          </td>
                          <!-- Contenido - tbl_asignatura TINT_semestre -->
                          <td>
                              <p class="select-p"
                              data-tabla="tbl_asignatura"
                              data-llave="TINT_semestre">
                              </p>
                              2018-2019
                          </td>
                          <!-- Contenido - tbl_datos_identificacion VCH_numero_parcial -->
                          <td>
                              <select class="combo-num"
                              data-start="1"
                              data-end="4">
                              </select>
                              ° parcial
                          </td>
                          <!-- Contenido - tbl_datos_identificacion VCH_numero_planeacion -->
                          <td>
                              <select class="combo-num"
                              data-start="1"
                              data-end="7">
                              </select>
                              de
                              <!-- Agregar listener para que el numero sea mayor -->
                              <select class="combo-num"
                              data-start="1"
                              data-end="7">
                              </select>
                          </td>
                        </tr>
                        <tr>
                            <td class="Requerimiento" style="font-size:12px;">
                                T&iacute;tulo de la Planeaci&oacute;n Estrat&eacute;gica:
                            </td>
                            <td class="combobox" colspan="3">
                                <textarea name="tbTituloPlaneacion" style="width:408px;height:50px;border:none"></textarea>
                            </td>
                            <td class="Requerimiento" style="font-size:12px;" colspan="2">
                                % de la PE en la evaluaci&oacute;n formativa del parcial
                            </td>
                            <td class="combobox">
                                <textarea name="tb%PE" style="width:148px;height:59px;border:none"></textarea>
                            </td>
                        </tr>
                    </form>
                </table>
            </div>

            <div class="espacio"></div>

            <!--Seccion B-->
            <button class="accordion" onclick="Acordeon()">INTENCIONES FORMATIVAS</button>
            <div class="panel">
                <table id="SeccionB" align="left">
                    <form action="PHPFunciones/Planeacion.php" method="post">
                        <tr>
                            <td class="Requerimiento" colspan="100%" style="text-align:center">
                                Prop&oacute;sito de la Planeaci&oacute;n Estrategia:
                            </td>
                        </tr>
                        <tr>
                            <td colspan="100%" class="combobox">
                                <textarea name="tbPropositoPlaneacion" style="width:994px;height:50px;border:none"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="Requerimiento">
                                Eje:
                            </td>
                            <td colspan="2" class="combobox">
                                <button class="btn-contenido" onclick="Abrir('Eje')">EL eje es</button>
                            </td>
                            <div id="myModal" class="modal" style="display:block">
                                <div class="modal-contenido">
                                    <div class="modal-header">
                                        <span class="close">&times;</span>
                                        <h2 id="TituloModal">Eje</h2>
                                    </div>
                                    <div class="modal-body">
                                        <!--Todos lo ejes-->
                                        <p>hola</p>
                                    </div>
                                  </div>
                            </div>
                            <td class="Requerimiento">
                                Componentes:
                            </td>
                            <td colspan="2" class="combobox">
                                <button class="btn-contenido">a</button>
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
        function Abrir(titulo)
        {
            document.getElementById("TituloModal").innerHTML = titulo;
        }
    </script>
  </body>
  </html>
