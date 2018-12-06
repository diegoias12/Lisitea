function IniciarAdministracionDisciplinar()
{
    $(document).ready(function(){
        Activa(5);
        RellenarSeccion();
        AccordionListener();
        ImgAccionListener();
    });
}

function RellenarSeccion()
{
    $('.seccion').each(function(){
        seccion = $(this);
        tabla = $(this).attr('id');
        padre = $(this).attr('data-padre');
        relacion = $(this).attr('data-relacion');
        CrearSeccion(tabla, padre, relacion).done(function(result){
            seccion.html(result);
            // Con este listener, las tablas serán mostradas cuando
            // se seleccione alguno de los elementos de su "padre"
            if(typeof padre !== 'undefined') {
                MostrarSeccionListener(tabla, padre);
            }
        });
    });
}

// ********************************************************

function IniciarCreacionPlan()
{
    CargarContenido();
    AgregarCodigo();
    Acordeon();
    TextBoxListener();
}

// CargarContenido()

function CargarContenido()
{
    $(document).ready(function(){
        // <p> </p>
        $('.select-p').each(function(){
            htmlP = $(this);
            nombre = $(this).attr('id');
            tabla = $(this).attr('data-tabla');
            llave = $(this).attr('data-llave');
            padre = $(this).attr('data-padre');
            if(typeof padre !== 'undefined') {
                PListener(nombre, llave, padre);
            }
            else {
                ObtenerVariablePHP(tabla, llave).done(function(id){
                    if(id >= 0) {
                        SqlSelectP(tabla, llave, id).done(function(result){
                            htmlP.html(result);
                        });
                    }
                    else {
                        htmlP.html('');
                    }
                });
            }
        });
        // <select> </select>
        $('.select-cb').each(function(){
            htmlSelect = $(this);
            nombre = $(this).attr('id');
            tabla = $(this).attr('data-tabla');
            llave = $(this).attr('data-llave');
            padre = $(this).attr('data-padre');
            relacion = $(this).attr('data-relacion');
            if(typeof padre !== 'undefined' || typeof relacion !== 'undefined') {
                $(this).prop('disabled', true);
            }
            if(typeof relacion !== 'undefined') {
                //
            }
            else if(typeof padre !== 'undefined') {
                ComboBoxListener(nombre, llave, padre);
            }
            else {
                SqlSelectComboBox(tabla, llave).done(function(result){
                    htmlSelect.html(result);
                });
            }
        });
        // <input type="checkbox">
        $('.select-ch').each(function(){
            htmlForm = $(this);
            nombre = $(this).attr('id');
            tabla = $(this).attr('data-tabla');
            llave = $(this).attr('data-llave');
            padre = $(this).attr('data-padre');
            if(typeof padre !== 'undefined') {
                //
            }
            else {
                SqlSelectCheckBox(tabla, llave).done(function(result){
                    htmlForm.html(result);
                });
            }
        });
        // <input type="radio">
        $('.select-rb').each(function(){
            htmlForm = $(this);
            nombre = $(this).attr('id');
            padre = $(this).attr('data-padre');
            relacion = $(this).attr('data-relacion');
            if(typeof relacion !== 'undefined') {
                RadioButtonListenerNM(nombre);
            }
            else if(typeof padre !== 'undefined') {
                RadioButtonListener(nombre);
            }
            else {
                tabla = $(this).attr('data-tabla');
                llave = $(this).attr('data-llave');
                SqlSelectRadioButton(tabla, llave).done(function(result){
                    htmlForm.html(result);
                });
            }
        });
        // <select> </select>
        $('.combo-num').each(function(){
            start = $(this).attr('data-start');
            end = $(this).attr('data-end');
            $(this).html(CrearComboBoxNum(start, end));
        });
    });
}

// ComboBox

function ComboBoxListener(nombre, llave, padre)
{
    $(document).ready(function(){
        $('#' + padre).change(function(){
            $('#' + nombre).prop('disabled', false);
            tabla = $('#' + nombre).attr('data-tabla');
            padre = $(this).attr('data-tabla');
            padreId = $(this).val();
            SqlSelectComboBoxId(tabla, llave, padre, padreId).done(function(result){
                $('#' + nombre).html(result);
            });
        });
    });
}

// RadioButton

function RadioButtonListener(nombre)
{
    $(document).ready(function(){
        $('#' + $('#' + nombre).attr('data-padre')).change(function(){
            tabla = $('#' + nombre).attr('data-tabla');
            llave = $('#' + nombre).attr('data-llave');
            padre = $(this).attr('data-tabla');
            padreId = $(this).find('input[type="radio"]:checked').val()
            SqlSelectRadioButtonId(tabla, llave, padre, padreId).done(function(result){
                $('#' + nombre).html(result);
            });
        });
    });
}

function RadioButtonListenerNM(nombre)
{
    $(document).ready(function(){
        $('#' + $('#' + nombre).attr('data-padre')).change(function(){
            tabla = $('#' + nombre).attr('data-tabla');
            llave = $('#' + nombre).attr('data-llave');
            padre = $(this).attr('data-tabla');
            padreId = $(this).find('input[type="radio"]:checked').val()
            relacion = $('#' + nombre).attr('data-relacion');
            SqlSelectRadioButtonNM(tabla, llave, padre, padreId, relacion).done(function(result){
                $('#' + nombre).html(result);
            });
        });
    });
}

// P

function PListener(nombre, llave, padre)
{
    $(document).ready(function(){
        $('#' + padre).change(function(){
            htmlSelect = $('#' + nombre);
            id = $(this).val();
            tabla = $(this).attr('data-tabla');
            if(id >= 0) {
                SqlSelectP(tabla, llave, id).done(function(result){
                    htmlSelect.html(result);
                });
            }
            else {
                htmlSelect.html('');
            }
        });
    });
}

// Num

function CrearComboBoxNum(start, end)
{
    htmlCB = '<option value="-1"></option>';
    for(; start < end; start++) {
        htmlCB += '<option value="' + start + '">' + start + '</option>';
    }
    return htmlCB;
}

// AgregarCodigo

function AgregarCodigo()
{
    $(document).ready(function(){
        AgregarEspaciosVacios('LlenadoC', 6);
        AgregarEspaciosVacios('LlenadoD', 4);
        AgregarEspaciosVacios('LlenadoE', 4);
        AgregarEspaciosVacios('LlenadoF', 4);
        var apartadosC
        = '<tr>'
        +   '<td class="Subrequerimiento" rowspan="2" width="8%">'
        +       '<p><span>Nivel taxon&oacute;mico de Marzano</span></p>'
        +   '</td>'
        +   '<td class="Subrequerimiento" rowspan="2" width="36%">'
        +       '<p>Actividades</p>'
        +   '</td>'
        +   '<td class="Subrequerimiento" colspan="2" width="22%">'
        +       '<p>Competencia(s)</p>'
        +   '</td>'
        +   '<td class="Subrequerimiento" rowspan="2" width="16%">'
        +       '<p>Producto(s) de Aprendizaje</p>'
        +   '</td>'
        +   '<td class="Subrequerimiento" rowspan="2">'
        +       '<p>Evaluaci&oacute;n<br>Tipo Instrumento Indicadores de logro</p>'
        +   '</td>'
        + '</tr>'
        + '<tr>'
        +   '<td class="Subrequerimiento">'
        +       '<p>Gen&eacute;rica(s) y sus atributos</p>'
        +   '</td>'
        +   '<td class="Subrequerimiento">'
        +       '<p>Disciplinar(es)/Profesional(es)</p>'
        +   '</td>'
        + '</tr>';
        var apartados = $('.Apartados');
        for( var i = 0; i < apartados.length; i++ ) {
            apartados[i].innerHTML = apartadosC;
        }
    });
}

function AgregarEspaciosVacios(clase, cantidad)
{
    areaLlenado = '';
    espacioVacio
    = '<td>'
    +   '<p><span>&nbsp;</span></p>'
    + '</td>';
    for(i = 0; i < cantidad; i++)
    {
        areaLlenado += espacioVacio;
    }
    llenado = $('.' + clase);
    for(i = 0; i < llenado.length; i++)
    {
        llenado[i].innerHTML = areaLlenado;
    }
}

// Acordeon

function Acordeon()
{
    $(document).ready(function(){
        acc = $('.accordion');
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
    });
}

// TextBoxListener
function TextBoxListener()
{
  $(document).ready(function(){
    $('.btn-contenido').click(function(){
      $('#Contenido').append(GenerarModal());
    });
  });
}

function GenerarModal(id)
{
  return
  '<div id="myModal" class="modal" style="display:block";>'
+ '    <div class="modal-contenido">'
+ '        <div class="modal-header">'
+ '            <span class="close">&times;</span>'
+ '            <h2 id="TituloModal">Eje</h2>'
+ '        </div>'
+ '        <div class="modal-body">'
+
+ '        </div>'
+ '      </div>'
+ '</div>';
}
