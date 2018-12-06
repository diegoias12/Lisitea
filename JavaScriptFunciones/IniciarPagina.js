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
    CheckboxListener();
}

function CargarContenido()
{
    $(document).ready(function(){
        // <p> </p>
        $('.select-p').each(function(){
            htmlP = $(this);
            tabla = $(this).attr('data-tabla');
            llave = $(this).attr('data-llave');
            ObtenerVariablePHP(tabla, llave).done(function(id){
                SqlSelectP(tabla, llave, id).done(function(result){
                    htmlP.html(result);
                });
            });
        });
        // <select> </select>
        $('.select-cb').each(function(){
            htmlSelect = $(this);
            tabla = $(this).attr('data-tabla');
            llave = $(this).attr('data-llave');
            SqlSelectComboBox(tabla, llave).done(function(result){
                htmlSelect.html(result);
            });
        });
        // <input type="checkbox">
        $('.select-ch').each(function(){
            htmlForm = $(this);
            tabla = $(this).attr('data-tabla');
            llave = $(this).attr('data-llave');
            SqlSelectCheckBox(tabla, llave).done(function(result){
                htmlForm.html(result);
            });
        });
    });
}

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

var espacioVacio
= '<td>'
+   '<p><span>&nbsp;</span></p>'
+ '</td>';

function AgregarEspaciosVacios(clase, cantidad)
{
    areaLlenado = '';
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

function CheckboxListener()
{
    $(document).ready(function(){
        cbAsignatura = $('select[data-tabla="tbl_asignatura"][data-llave="VCH_nombre"]');
        semestre = $('[data-tabla="tbl_asignatura"][data-llave="TINT_semestre"]');
        $('select[data-tabla="tbl_campo_disciplinar"][data-llave="VCH_nombre"]').change(function(){
            semestre.html('');
            cbAsignatura.prop('disabled', false);
            tabla = cbAsignatura.attr('data-tabla');
            llave = cbAsignatura.attr('data-llave');
            padre = $(this).attr('data-tabla');
            padreId = $(this).val();
            if(padreId == -1) {
                cbAsignatura.html('<option value="-1"></option>');
                return;
            }
            SqlSelectComboBoxId(tabla, llave, padre, padreId).done(function(result){
                cbAsignatura.html(result);
            });
        });
        cbAsignatura.change(function(){
            tabla = semestre.attr('data-tabla');
            llave = semestre.attr('data-llave');
            id = $(this).val();
            SqlSelectP(tabla, llave, id).done(function(result){
                semestre.html(result);
            });
        });
    });
}
