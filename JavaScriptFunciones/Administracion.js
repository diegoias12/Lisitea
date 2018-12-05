// Cuando la tabla "padre" selecciona un radio button
// Se muestran sus hijos
function MostrarSeccionListener(tabla, padre)
{
    $(document).ready(function(){
        // Se verifica que secciones existan
        if(tabla == '' || padre == '' ||
            $('#' + tabla + '.seccion').length == 0 || $('#' + tabla + ' div.panel').length == 0 ||
            $('#' + padre).length == 0)
        {
            alert('Error: MostrarSeccionListener()');
            return;
        }
        // Se muestra la tabla hijo, unicamente .accordion
        // Y se reinician el resto de tablas
        $('#' + padre).on('change', 'input[type="radio"]', function(){
            $('#' + tabla + '.seccion').show();
            $('#' + tabla + ' div.panel').hide();
            $('#' + tabla + ' img.accion').hide();
            $('#' + tabla).nextAll('div.seccion').hide();
        });
    });
}

// Escucha los radio button para mostrar img.accion
function ImgAccionRadioBtnListener(id, imgAccion)
{
    $(document).ready(function(){
        imgAccion.eq(1).show(); // Anadir
        // Mostrar CheckBox si esta tabla cuenta con una relacion NM
        if(typeof $('#' + id + ' div.accordion span').attr('data-relacion') == 'string') {
            imgAccion.eq(6).show(); // Checkbox
        }
        // Mostrar Editar y Eliminar al seleccionar un radio button
        $('form.tabla').on('change', 'table input[type="radio"]', function(){
            imgAccion.eq(2).show(); // Eliminar
            imgAccion.eq(3).show(); // Editar
        });
    });
}

// Despliega div.panel y carga la tabla
function AccordionListener()
{
    $(document).ready(function(){
        $('.accordion span').click(function() {
            // Se recuperan todos los datos del mismo label
            tabla = $(this).closest('div.seccion').attr('id');
            padre = $(this).attr('data-padre');
            relacion = $(this).attr('data-relacion');
            padreId = (padre != '') ? $('#' + padre + ' input[type="radio"]:checked').val() : '';
            // A la vez, se toma el id de la seccion y se seleccionan sus imgAccion
            imgAccion = $(this).nextAll('img.accion');
            id = $(this).closest('div.seccion').attr('id');
            // Si se detecta el cambio, se activa
            $('#' + id + ' div.panel').toggle(0, function(){
                // Al ocultarse div.panel, tambien se esconden los imgAccion
                // y el resto de tablas
                if($(this).is(':hidden')) {
                    imgAccion.hide();
                    $('#' + id).nextAll('div.seccion').hide();
                }
                // Se carga la tabla y se agregan los listeners para mostrar los imgAccion
                else {
                    $.when($.ajax(CrearTabla(tabla, padre, padreId, relacion))).then(function(){
                        ImgAccionRadioBtnListener(id, imgAccion);
                    });
                }
            });
        });
    });
}

// Llama la funcion en PHP para cargar la tabla
function CrearTabla(strTabla, strPadre, intPadreId, strRelacion)
{
    if(strTabla == '' || $('#' + strTabla + ' form.tabla').length == 0)
    {
        alert('Error: CrearTabla()');
        return;
    }
    $(document).ready(function(){
        $.ajax({
            url: 'PHPFunciones/SqlCreateTable.php',
            type: 'post',
            data: {tabla: strTabla, padre: strPadre, padreId: intPadreId, relacion: strRelacion},
            async: false,
            success: function(HtmlTabla){
                $('#' + strTabla + ' form.tabla').html(HtmlTabla);
            }
        });
    });
}

//Muestra la opcion seleccionada
function Activa(intTipo)
{
    var dis = document.getElementById("Disciplina");
    var prof = document.getElementById("Profesion");
    var gene = document.getElementById("General");
    dis.classList.toggle("Activar");
    prof.classList.toggle("Activar");
    gene.classList.toggle("Activar");
    if(intTipo == 1)
    {
        dis.classList.toggle("Activar");
    }
    else if(intTipo == 2)
    {
        prof.classList.toggle("Activar");
    }
    else
    {
        gene.classList.toggle("Activar");
    }
}
