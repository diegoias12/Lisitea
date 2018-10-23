<!doctype html>

<html>
<head>
    <?php /*require 'PHPInclude\\Head.php';*/ ?>
    <?php /*include 'PHPInclude\\Head.php';*/ ?>
    <title>Creacion - CECyTEM Tequixquiac</title>
    <link rel="stylesheet" type="text/css" href="../CSSEstilos/General.css"/>
    <link rel="stylesheet" type="text/css" href="../CSSEstilos/Menu.css"/>
    <link rel="stylesheet" type="text/css" href="../CSSEstilos/Planeacion.css"/>
    <script type="text/javascript" src="../JavaScriptFunciones/Menu.js"></script>
    <script type="text/javascript" src="../JavaScriptFunciones/Planeacion.js"></script>
</head>

<body>
    <div id="Menu">
        <?php require '../PHPInclude/Menu.php'; ?>
        <?php /*include 'PHPInclude\\Menu.php';*/ ?>
    </div>

    <div id="Contenido">

        <div>
            <button type="button">Guardar</button>
            <button type="button">Enviar</button>
            <!-- <button type="button" onclick="CrearPdf()">PDF</button> -->
        </div>

        <div id="DocPlan">
            <p style="text-align: center; font-family: 'Times New Roman'"><strong>INSTRUMENTO PARA LA PLANEACI&Oacute;N ESTRAT&Eacute;GICA</strong></p>

            <br>

            <table id="SeccionA" align="center">
            <tr style="border-bottom-style: hidden;">
                <td colspan="2" style="border-right-style: hidden;">
                    <img src="Imagenes\GobEdoMex.jpg" height="60%">
                </td>
                <td colspan="4" style="border-right-style: hidden;"></td>
                <td>
                    <img src="Imagenes\CECyTEM.png"
                </td>
            </tr>
            <tr>
                <td colspan="100%">
                    <p style="text-align: center;"><strong><span style="font-size: 11.0pt;  ">PLANEACI&Oacute;N ESTRATEGICA</span></strong></p>
                </td>
            </tr>
            <tr>
                <td class="TituloSeccion" colspan="100%">
                    <p>A) DATOS DE IDENTIFICACI&Oacute;N</p>
                </td>
            </tr>
            <tr>
                <td class="Requerimiento" width="20%">
                    <p style="margin-right: 8.75pt; text-align: right;"><span>Instituci&oacute;n:</span></p>
                </td>
                <td colspan="6">
                    <p><span>Colegio  de  Estudios  Cient&iacute;ficos  y  Tecnol&oacute;gicos  del  Estado  de  M&eacute;xico</span></p>
                </td>
            </tr>
            <tr>
                <td class="Requerimiento">
                    <p style="margin-right: 8.75pt; text-align: right;"><span>Plantel:</span></p>
                </td>
                <td colspan="6">
                    <p><span>Tequixquiac</span></p>
                </td>
            </tr>
            <tr>
                <td class="Requerimiento">
                    <p style="margin-right: 8.75pt; text-align: right;"><span>CCT:</span></p>
                </td>
                <td width="25%">
                    <p><span>15ETC0042H</span></p>
                </td>
                <td class="Requerimiento" width="15%">
                    <p><span>Docente:</span></p>
                </td>
                <td width="40%" colspan="4">
                    <p><span id="NombreDocente">&nbsp;</span></p>
                </td>
            </tr>
            <tr>
                <td class="Requerimiento" rowspan="2">
                    <p style="margin-right: 9.7pt; text-align: right;"><span>Asignatura o M&oacute;dulo:</span></p>
                </td>
                <td>
                    <select id="cbCampoDisciplinar">
                        <option>-- Campo Disciplinar --</option>
                    </select>
                </td>
                <td class="Requerimiento">
                    <p><span>Especialidad:</span></p>
                </td>
                <td class="Requerimiento" width="14%">
                    <p><span>Semestre:</span></p>
                </td>
                <td class="Requerimiento" width="14%" colspan="2">
                    <p><span>N&uacute;mero de parcial donde aplicar&aacute;:</span></p>
                </td>
                <td class="Requerimiento" width="12%">
                    <p><span>N&uacute;mero de planeaci&oacute;n:</span></p>
                </td>
            </tr>
            <tr>
                <td>
                    <select id="cbAsignatura">
                        <option>-- Asignatura --</option>
                        <option value="Matematicas">Matem&aacute;ticas</option>
                        <option value="Historia">Historia</option>
                    </select>
                </td>
                <td>
                    <select id="cbEspecialidad">
                        <option>-- Especialidad --</option>
                    </select>
                </td>
                <td>
                    <select id="cbSemestre">
                        <option>-- Semestre --</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </td>
                <td colspan="2">
                    <select id="cbNoParcial">
                        <option>-- Parcial --</option>
                    </select>
                </td>
                <td>
                    <var id="noPlan"></var> de <var id="totalPlan"></var>
                </td>
            </tr>
            <tr>
                <td class="Requerimiento">
                    <p style="margin-right: 9.7pt; text-align: right;"><span>T&iacute;tulo de la Planeaci&oacute;n Estrat&eacute;gica:</span></p>
                </td>
                <td colspan="2">
                    <textarea name="tbTituloPlaneacion" maxlength="100"></textarea>
                </td>
                <td class="Requerimiento" width="20%" colspan="2">
                    <p><span>% de la PE en la evaluaci&oacute;n formativa del parcial</span></p>
                </td>
                <td width="20%" colspan="2">
                    <textarea name="tb%PE" maxlength="3" rows="1" cols="4"></textarea>
                </td>
            </tr>
            </table>

            <br>

            <table id="SeccionB" align="center">
            <tr>
                <td class="TituloSeccion" colspan="100%">
                    <p>B) INTENCIONES FORMATIVAS</p>
                </td>
            </tr>
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
            <tr style="page-break-inside: avoid;">
                <td class="Requerimiento" width="10%">
                    <p><span>Eje:</span></p>
                </td>
                <td width="34%">
                    <p><span>&nbsp;</span></p>
                </td>
                <td class="Requerimiento" width="14%" colspan="2">
                    <p><span>Componentes:</span></p>
                </td>
                <td>
                    <p><span>&nbsp;</span></p>
                </td>
            </tr>
            <tr>
                <td class="Requerimiento" colspan="100%">
                    <p><span>Contenido central:</span></p>
                </td>
            </tr>
            <tr>
                <td colspan="100%">
                    <p><span>&nbsp;</span></p>
                </td>
            </tr>
            <tr>
                <td class="Requerimiento" width="50%" colspan="3">
                    <p><span>Contenidos especificos:</span></p>
                </td>
                <td class="Requerimiento" width="50%" colspan="2">
                    <p><span>Aprendizajes esperados:</span></p>
                </td>
            </tr>
            <tr>
                <td width="50%" colspan="3">
                    <p><span>&nbsp;</span></p>
                </td>
                <td width="50%" colspan="2">
                    <p><span>&nbsp;</span></p>
                </td>
            </tr>
            <tr>
                <td class="Requerimiento" colspan="100%">
                    <p><span>Productos esperados:</span></p>
                </td>
            </tr>
            <tr>
                <td colspan="100%">
                    <p><span>&nbsp;</span></p>
                </td>
            </tr>
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

            <br>

            <table id="SeccionC" align="center">
            <tr>
                <td class="TituloSeccion" colspan="100%">
                    <p>C) ACTIVIDADES DE APRENDIZAJE</p>
                </td>
            </tr>
            <tr>
                <td class="Requerimiento" colspan="100%">
                    <p>Apertura</p>
                </td>
            </tr>
            <tbody class="Apartados"></tbody>
            <tr class="LlenadoC"></tr>
            <tr class="LlenadoC"></tr>
            <tr class="LlenadoC"></tr>
            <tr>
                <td class="Requerimiento" colspan="100%">
                    <p>Desarrollo</p>
                </td>
            </tr>
            <tbody class="Apartados"></tbody>
            <tr class="LlenadoC"></tr>
            <tr class="LlenadoC"></tr>
            <tr class="LlenadoC"></tr>
            <tr>
                <td class="Requerimiento" colspan="100%">
                    <p>Cierre</p>
                </td>
            </tr>
            <tbody class="Apartados"></tbody>
            <tr class="LlenadoC"></tr>
            <tr class="LlenadoC"></tr>
            <tr class="LlenadoC"></tr>
            </table>

            <br>

            <table id="SeccionD" align="center">
            <tr>
                <td class="TituloSeccion" colspan="100%">
                    <p>D) RECURSOS</p>
                </td>
            </tr>
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

            <br>

            <table id="SeccionE" align="center">
            <tr>
                <td class="TituloSeccion" colspan="100%">
                    <p>E) INSTRUMENTOS</p>
                </td>
            </tr>
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

            <br>

            <table id="SeccionF" align="center">
            <tr>
                <td class="TituloSeccion" colspan="100%">
                    <p>F) RUBRICAS</p>
                </td>
            </tr>
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

            <br>
        </div>
    </div>

    <script>
        //AgregarCodigo();
    </script>
</body>
</html>
