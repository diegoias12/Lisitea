function myFun()
{
    /*
    alert(RemoveSubstr('tbl_modulo', 'tbl_'););
    alert(RemoveSubstr('aabbcc', 'ab'););
    alert(RemoveSubstr('abc', 'd'););
    */
    /*
    alert(GetTdIndex('tbl_especialidad', 'FK_id'));
    alert(GetTdIndex('tbl_modulo', 'FK_id_especialidad'));
    alert(GetTdIndex('tbl_submodulo', 'FK_id_modulo'));
    */
}

// Cuando la tabla "padre" selecciona una opcion
// Se muestran sus hijos
function MostrarSeccionListener(tabla, padre)
{
    $(document).ready(function(){
        if(tabla == '' || padre == '' ||
            $('#' + tabla + '.seccion').length == 0 || $('#' + tabla + ' div.panel').length == 0 ||
            $('#' + padre).length == 0)
        {
            alert('Error: MostrarSeccionListener()');
            return;
        }
        $('#' + padre).on('change', 'input[type="radio"]', function(){
            $('#' + tabla + '.seccion').show();
            $('#' + tabla + ' div.panel').hide();
        });
    });
}

// Despliega  div.panel y carga la tabla
function ButtonAccordionListener()
{
    $(document).ready(function(){
        $(':button.accordion').click(function() {
            tabla = $(this).parent('div.seccion').attr('id');
            padre = $(this).attr('data-padre');
            relacion = $(this).attr('data-relacion');
            padreId = $('#' + padre + ' input[type="radio"]:checked').val();
            $(this).next('div.panel').toggle(0, function(){
                CrearTabla(tabla, padre, padreId, relacion);
            });
        });
    });
}

// Llama la funcion en PHP para cargar la tabla
function CrearTabla(strTabla, strPadre, intPadreId, strRelacion)
{
    if(strTabla == '' || strPadre == '' ||
        $('#' + strTabla + ' form.tabla').length == 0)
    {
        alert('Error: CrearTabla()');
        return;
    }
    $(document).ready(function(){
        $.ajax({
            url: 'PHPFunciones/CargarTabla.php',
            type: 'get',
            data: {tabla: strTabla, padre: strPadre, padreId: intPadreId, relacion: strRelacion},
            success: function(HtmlTabla){
                $('#' + strTabla + ' form.tabla').html(HtmlTabla);
            }
        });
    });
}

function AnadirElemento(tabla)
{
    $(document).ready(function(){
        if(tabla == '' || $('#' + tabla).length == 0)
        {
            alert('Error: AnadirElemento()');
            return;
        }
        /*
        // Crear string de HTML
        htmlStr = '<tr>';
        length =
        for
        htmlStr .= '</tr>';
        // Añadir los textbox a la tabla
        row = $('#' + tabla + ' tr');
        row.last().after();
        */
    });
}
