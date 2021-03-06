<!doctype html>

<?php require 'PHPInclude/NegarAcceso.php'; ?>

<html>
<head>
    <link rel="icon" href="Imagenes/Lisitea.png">
    <?php /*require 'PHPInclude\\Head.php';*/ ?>
    <?php /*include 'PHPInclude\\Head.php';*/ ?>
    <title>Creacion - CECyTEM Tequixquiac</title>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/General.css"/>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/Menu.css"/>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/Planeacion.css"/>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/VentanaEmergente.css"/>
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
    </div>
    <div id="Contenido" class="contenedor">
        <div class="contenido">
            <p class="encabezado">
                INSTRUMENTO PARA LA PLANEACI&Oacute;N ESTRAT&Eacute;GICA
            </p>
            <button class="accordion" onclick="Acordeon()">TIPO DE CAMPO</button>
            <div class="panel">
                <form>
                    <div class="label">
                        <input type="radio" name="campo" value="2" >Campo Disciplinar<br>
                    </div>
                    <div class="label">
                        <input type="radio" name="campo" value="3">Campo Profesional<br>
                    </div>
                </form>
            </div>
            <p class="encabezado">
                PLANEACI&Oacute;N ESTRATEGICA
            </p>
            <button class="accordion" onclick="Acordeon()">A) DATOS DE IDENTIFICACI&Oacute;N</button>
            <div class="panel">
                <table id="SeccionA" align="left">
                    <form action="PHPFunciones/Planeacion.php" method="post">
                        <!-- Fila - Institucion -->
                        <tr>
                            <!-- Institucion -->
                            <td class="Requerimiento" width="20%">
                              <p style="margin-right: 8.75pt; text-align: right;"><span>Instituci&oacute;n:</span></p>
                            </td>
                            <!-- Contenido tbl_plantel VCH_institucion -->
                            <td colspan="6">
                                <p class="select-p" data-tabla="tbl_plantel" data-llave="VCH_institucion"></p>
                            </td>
                        </tr>
                        <!-- Fila - Plantel -->
                        <tr>
                          <!-- Plantel -->
                          <td class="Requerimiento">
                              <p style="margin-right: 8.75pt; text-align: right;"><span>Plantel:</span></p>
                          </td>
                          <!-- Contenido - tbl_plantel VCH_institucion -->
                          <td colspan="6">
                              <p><span>Tequixquiac</span></p>
                          </td>
                        </tr>
                        <!-- Fila - CCT Docente -->
                        <tr>
                          <!-- CCT -->
                          <td class="Requerimiento">
                              <p style="margin-right: 8.75pt; text-align: right;"><span>CCT:</span></p>
                          </td>
                          <!-- Contenido - tbl_plantel VCH_CCT -->
                          <td width="25%">
                              <p class="select-p" data-tabla="tbl_plantel" data-llave="VCH_CCT"></p>
                          </td>
                          <!-- Docente -->
                          <td class="Requerimiento" width="15%">
                              <p><span>Docente:</span></p>
                          </td>
                          <!-- Contenido - tbl_usuario VCH_nombre VCH_ap_paterno VCH_ap_materno -->
                          <td width="40%" colspan="4">
                              <div class="select-p" data-tabla="tbl_usuario" data-llave="VCH_nombre"></div>
                              <div class="select-p" data-tabla="tbl_usuario" data-llave="VCH_ap_paterno"></div>
                              <div class="select-p" data-tabla="tbl_usuario" data-llave="VCH_ap_materno"></div>
                          </td>
                        </tr>
                        <!-- Fila - Asignatura Especialidad Semestre NoParcial NoPlaneacion -->
                        <tr>
                          <!-- Asignatura -->
                          <td class="Requerimiento" rowspan="2">
                              <p style="margin-right: 9.7pt; text-align: right;"><span>Asignatura o M&oacute;dulo:</span></p>
                          </td>
                          <!-- Contenido - tbl_campo_disciplinar VCH_nombre -->
                          <td>
                              <select class="select-cb"
                              id="cbCampoDisciplinar"
                              data-tabla="tbl_campo_disciplinar"
                              data-llave="VCH_nombre">
                              </select>
                          </td>
                          <!-- Especialidad -->
                          <td class="Requerimiento">
                              <p><span>Especialidad:</span></p>
                          </td>
                          <!-- Semestre -->
                          <td class="Requerimiento" width="14%">
                              <p><span>Semestre:</span></p>
                          </td>
                          <!-- NoParcial -->
                          <td class="Requerimiento" width="14%" colspan="2">
                              <p><span>N&uacute;mero de parcial donde aplicar&aacute;:</span></p>
                          </td>
                          <!-- NoPlaneacion -->
                          <td class="Requerimiento" width="12%">
                              <p><span>N&uacute;mero de planeaci&oacute;n:</span></p>
                          </td>
                        </tr>
                        <!-- Fila -->
                        <tr>
                          <!-- Contenido - tbl_asignatura VCH_nombre -->
                          <td>
                              <select class="select-cb"
                              id="cbAsignatura"
                              data-tabla="tbl_asignatura"
                              data-llave="VCH_nombre"
                              data-padre="cbCampoDisciplinar">
                              </select>
                          </td>
                          <!-- Contenido - tbl_especialidad VCH_nombre -->
                          <td class="select-ch"
                          data-tabla="tbl_especialidad"
                          data-llave="VCH_nombre">
                          </td>
                          <!-- Contenido - tbl_asignatura TINT_semestre -->
                          <td>
                              <p class="select-p"
                              id="cbAsignaturaSemestre"
                              data-tabla="tbl_asignatura"
                              data-llave="TINT_semestre"
                              data-padre="cbAsignatura">
                              </p>
                          </td>
                          <!-- Contenido - tbl_datos_identificacion VCH_numero_parcial -->
                          <td colspan="2">
                              <select class="combo-num"
                              data-start="1"
                              data-end="4">
                              </select>
                          </td>
                          <!-- Contenido - tbl_datos_identificacion VCH_numero_planeacion -->
                          <td>
                              <select class="combo-num"
                              data-start="1"
                              data-end="5">
                              </select>
                              de
                              <!-- Agregar listener para que el numero sea mayor -->
                              <select class="combo-num"
                              data-start="1"
                              data-end="5">
                              </select>
                          </td>
                        </tr>
                        <!-- TituloPlaneacion  PE -->
                        <tr>
                          <td class="Requerimiento">
                              <p style="margin-right: 9.7pt; text-align: right;"><span>T&iacute;tulo de la Planeaci&oacute;n Estrat&eacute;gica:</span></p>
                          </td>
                          <td colspan="2">

                          </td>
                          <td class="Requerimiento" width="20%" colspan="2">
                              <p><span>% de la PE en la evaluaci&oacute;n formativa del parcial</span></p>
                          </td>
                          <td width="20%" colspan="2">

                          </td>
                        </tr>
                    </form>
                </table>
            </div>

            <div class="espacio"></div>

            <button class="accordion" onclick="Acordeon()">B) INTENCIONES FORMATIVAS</button>
            <div class="panel">
              <table id="SeccionB" align="left">
                  <!-- Proposito de la Planeacion Estrategia -->
                  <tr>
                      <td class="Requerimiento" colspan="100%">
                          <p style="margin-left: 8.75pt; text-align: left;"><span>Prop&oacute;sito de la Planeaci&oacute;n Estrategia:</span></p>
                      </td>
                  </tr>
                  <tr>
                      <td colspan="100%">
                          <p><span>&nbsp;</span></p>
                      </td>
                  </tr>
                  <!-- Eje / Componentes -->
                  <tr style="page-break-inside: avoid;">
                      <td class="Requerimiento" width="10%">
                          <p><span>Eje:</span></p>
                      </td>
                      <td width="34%"
                      class="select-rb"
                      id="rbEje"
                      data-tabla="tbl_eje"
                      data-llave="VCH_descripcion">
                      </td>
                      <td class="Requerimiento" width="14%" colspan="2">
                          <p><span>Componentes:</span></p>
                      </td>
                      <td
                      class="select-rb"
                      id="rbComponente"
                      data-tabla="tbl_componente"
                      data-llave="VCH_descripcion"
                      data-padre="rbEje">
                      </td>
                  </tr>
                  <!-- Contenido central -->
                  <tr>
                      <td class="Requerimiento" colspan="100%">
                          <p><span>Contenido central:</span></p>
                      </td>
                  </tr>
                  <tr>
                      <td colspan="100%"
                      class="select-rb"
                      id="rbContenidoCentral"
                      data-tabla="tbl_contenido_central"
                      data-llave="VCH_descripcion"
                      data-padre="rbComponente">
                      </td>
                  </tr>
                  <!-- Contenidos especificos / Aprendizajes esperados -->
                  <tr>
                      <td class="Requerimiento" width="50%" colspan="3">
                          <p><span>Contenidos especificos:</span></p>
                      </td>
                      <td class="Requerimiento" width="50%" colspan="2">
                          <p><span>Aprendizajes esperados:</span></p>
                      </td>
                  </tr>
                  <tr>
                      <td width="50%" colspan="3"
                      class="select-ch"
                      id="rbContenidoEspecifico"
                      data-tabla="tbl_contenido_especifico"
                      data-llave="VCH_descripcion"
                      data-padre="rbContenidoCentral"
                      data-relacion="tbl_contenido_contenido">
                      </td>
                      <td width="50%" colspan="2"
                      class="select-ch"
                      id="rbAprendizajeEsperado"
                      data-tabla="tbl_aprendizaje_esperado"
                      data-llave="VCH_descripcion"
                      data-padre="rbContenidoEspecifico"
                      data-relacion="tbl_contenido_aprendizaje">
                      </td>
                  </tr>
                  <!-- Productos esperados -->
                  <tr>
                      <td class="Requerimiento" colspan="100%">
                          <p><span>Productos esperados:</span></p>
                      </td>
                  </tr>
                  <tr>
                      <td colspan="100%"
                      class="select-ch"
                      id="chProductoEsperado"
                      data-tabla="tbl_producto_esperado"
                      data-llave="VCH_descripcion"
                      data-padre="rbAprendizajeEsperado"
                      data-relacion="tbl_aprendizaje_producto">
                      </td>
                  </tr>
                  <!-- Competencias genericas y atributos -->
                  <tr>
                      <td class="Requerimiento" colspan="100%">
                          <p><span>Competencias gen&eacute;ricas y atributos:</span></p>
                      </td>
                  </tr>
                  <tr>
                      <td colspan="100%">
                          <p><span>&nbsp;</span></p>
                      </td>
                  </tr>
                  <!-- Competencias disciplinares -->
                  <tr>
                      <td class="Requerimiento" colspan="100%">
                          <p><span>Competencias disciplinares:</span></p>
                      </td>
                  </tr>
                  <tr>
                      <td colspan="100%">
                          <p><span>&nbsp;</span></p>
                      </td>
                  </tr>
                  <!-- Competencias profesionales -->
                  <tr>
                      <td class="Requerimiento" colspan="100%">
                          <p><span>Competencias profesionales:</span></p>
                      </td>
                  </tr>
                  <tr>
                      <td colspan="100%">
                          <p><span>&nbsp;</span></p>
                      </td>
                  </tr>
                  <!-- Habilidades socioemocionales -->
                  <tr>
                      <td class="Requerimiento" colspan="100%">
                          <p><span>Habilidades socioemocionales:</span></p>
                      </td>
                  </tr>
                  <tr>
                      <td colspan="100%">
                          <p><span>&nbsp;</span></p>
                      </td>
                  </tr>
              </table>
            </div>

            <div class="espacio"></div>

            <button class="accordion" onclick="Acordeon()">C) ACTIVIDADES DE APRENDIZAJE</button>
            <div class="panel">
              <table id="SeccionC" align="center">
              <tr>
                  <td class="Requerimiento" colspan="100%">
                      <p>Apertura</p>
                  </td>
              </tr>
              <tbody class="Apartados"></tbody>
              <tr class="LlenadoC"></tr>
              <tr>
                <td colspan="100%">
                  <img src="Imagenes/Anadir.png" style="width: 30px; height: 30px; float: right;" />
                </td>
              </tr>
              <tr>
                  <td class="Requerimiento" colspan="100%">
                      <p>Desarrollo</p>
                  </td>
              </tr>
              <tbody class="Apartados"></tbody>
              <tr class="LlenadoC"></tr>
              <tr>
                <td colspan="100%">
                  <img src="Imagenes/Anadir.png" style="width: 30px; height: 30px; float: right;" />
                </td>
              </tr>
              <tr>
                  <td class="Requerimiento" colspan="100%">
                      <p>Cierre</p>
                  </td>
              </tr>
              <tbody class="Apartados"></tbody>
              <tr class="LlenadoC"></tr>
              </table>
            </div>

            <div class="espacio"></div>

            <button class="accordion" onclick="Acordeon()">D) RECURSOS</button>
            <div class="panel">
                <table id="SeccionD" align="left">
                <tr>
                    <td class="Requerimiento" width="21%">
                        <p>Equipo</p>
                    </td>
                    <td class="Requerimiento" width="16%">
                        <p>Material</p>
                    </td>
                    <td class="Requerimiento" width="16%">
                        <p>Espacios f&iacute;sicos</p>
                    </td>
                    <td class="Requerimiento">
                        <p>Fuentes de informaci&oacute;n</p>
                    </td>
                </tr>
                <tr class="LlenadoD"></tr>
                <tr class="LlenadoD"></tr>
                <tr class="LlenadoD"></tr>
                </table>
            </div>

            <div class="espacio"></div>

            <button class="accordion" onclick="Acordeon()">E) INSTRUMENTOS</button>
            <div class="panel">
              <table id="SeccionE" align="left">
              <tr>
                  <td class="Requerimiento" width="11%">
                      <p>No. de anexo</p>
                  </td>
                  <td class="Requerimiento" width="40%">
                      <p>Instrumento</p>
                  </td>
                  <td class="Requerimiento" width="28%">
                      <p>T&iacute;tulo</p>
                  </td>
                  <td class="Requerimiento">
                      <p>Porcentaje de la evaluaci&oacute;n que se obtiene con cada instrumento</p>
                  </td>
              </tr>
              <tr class="LlenadoE"></tr>
              <tr class="LlenadoE"></tr>
              <tr class="LlenadoE"></tr>
              </table>
            </div>

            <div class="espacio"></div>

            <button class="accordion" onclick="Acordeon()">F) RUBRICAS</button>
            <div class="panel">
              <table id="SeccionF" align="center">
              <tr>
                  <td class="Requerimiento" width="25%">
                      <p>Realiz&oacute;</p>
                  </td>
                  <td class="Requerimiento" width="25%">
                      <p>Revisi&oacute;n t&eacute;cnica-pedag&oacute;gica</p>
                  </td>
                  <td class="Requerimiento" width="25%">
                      <p>Revisi&oacute;n de pertinencia escolar</p>
                  </td>
                  <td class="Requerimiento">
                      <p>Sello escolar</p>
                  </td>
              </tr>
              <tr class="LlenadoF"></tr>
              </table>
            </div>
        </div>
    </div>

</body>
</html>
