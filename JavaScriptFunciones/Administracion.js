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
            $('#' + tabla + ' img.accion').hide();
        });
    });
}

// Escucha los radio button para mostrar img.accion
function ImgAccionRadioBtnListener(divPanel, imgAccion)
{
    $(document).ready(function(){
        // Mostrar Anadir
        imgAccion.eq(1).show(); // Anadir
        // Mostrar Editar y Eliminar al seleccionar un radio button
        $('form.tabla').on('change', 'table input[type="radio"]', function(){
            imgAccion.eq(2).show(); // Eliminar
            imgAccion.eq(3).show(); // Editar
        });
        // "Error" al dar click a .imgAccion se activa button.
    });
}

// Despliega  div.panel y carga la tabla
function AccordionListener()
{
    $(document).ready(function(){
        $('.accordion span').click(function() {
            tabla = $(this).closest('div.seccion').attr('id');
            padre = $(this).attr('data-padre');
            relacion = $(this).attr('data-relacion');
            padreId = $('#' + padre + ' input[type="radio"]:checked').val();
            imgAccion = $(this).nextAll('img.accion');
            id = $(this).closest('div.seccion').attr('id');
            $('#' + id + ' div.panel').toggle(0, function(){
                if($(this).is(':hidden')) {
                    imgAccion.hide();
                }
                else {
                    $.when($.ajax(CrearTabla(tabla, padre, padreId, relacion))).then(function(){
                        ImgAccionRadioBtnListener($(this), imgAccion);
                    });
                }
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

// Activa img.accion
function ImgAccionListener()
{
    $(document).ready(function(){
        $('img.accion').click(function() {
            // Utilza el mismo nombre de la imagen
            str = $(this).attr('src');
            tipo = str.substr(9, str.length - 9 - 4);
            id = $(this).closest('div.seccion').attr('id');
            imgAcc = $('#' + id + ' img.accion');
            switch(tipo) {
                case 'Cancelar':
                    ImgAccCancelar(imgAcc, id);
                    break;
                case 'Anadir':
                    ImgAccAnadir(imgAcc, id);
                    break;
                case 'Eliminar':
                    ImgAccEliminar(imgAcc, id);
                    break;
                case 'Editar':
                    ImgAccEditar(imgAcc, id);
                    break;
                case 'Todo':
                    ImgAccTodo(imgAcc, id);
                    break;
            }
        });
    });
}

function ImgAccCancelar(imgAcc, id)
{
    // Salir de modo de adicion
    imgAcc.eq(0).hide(); // Cancelar
    if($('#' + id).has('input[type="radio"]:checked').length > 0) {
        imgAcc.eq(2).show(); // Eliminar
        imgAcc.eq(3).show(); // Editar
    }
    $('#' + id + ' tr').has('input[type="radio"]').show();
    $('#' + id).find('.textBoxRow').remove();
}

// Genera los espacios donde se escribira la informacion
function GenerarTr(veces)
{
    htmlCode = '<tr class="textBoxRow"><td></td>';
    htmlCode += '<td><input type="text"></td>'.repeat(veces - 1);
    htmlCode += '</tr>';
    return htmlCode;
}

function ImgAccAnadir(imgAcc, id)
{
    if(imgAcc.eq(0).is(':hidden')) {
        // Entrar en modo de adicion
        imgAcc.eq(0).show(); // Cancelar
        imgAcc.eq(2).hide(); // Eliminar
        imgAcc.eq(3).hide(); // Editar
        // Agregar textbox y ocultar los elementos
        $('#' + id + ' tr').has('input[type="radio"]').hide();
        tr = $('#' + id + ' tr:first')[0];
        $(tr).after(GenerarTr(tr.childElementCount));
    }
    else {
        ImgAccCancelar(imgAcc, id);
    }
}

function ImgAccEliminar(imgAcc, id)
{

}

function ImgAccEditar(imgAcc, id)
{

}

function ImgAccTodo(imgAcc, id)
{

}
