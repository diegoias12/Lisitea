// Activa img.accion
function ImgAccionListener()
{
    $(document).ready(function(){
        $('img.accion').on('click', function() {
            // Utilza el mismo nombre de la imagen
            // 'Imagenes/' tiene 9 caracteres
            // '.png' tiene 4 caracteres
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
                case 'Guardar':
                    ImgAccGuardar(imgAcc, id);
                    break;
                case 'Todo':
                    ImgAccTodo(imgAcc, id);
                    break;
            }
        });
    });
}

// ********************************************************

function ImgAccCancelar(imgAcc, id)
{
    // Salir de modo de adicion
    // Ocultar y mostrar imgAccion
    imgAcc.eq(0).hide(); // Cancelar
    if($('#' + id).has('input[type="radio"]:checked').length > 0) {
        imgAcc.eq(2).show(); // Eliminar
        imgAcc.eq(3).show(); // Editar
    }
    // Mostrar las filas previamente ocultadas
    $('#' + id + ' tr').has('input[type="radio"]').show();
    // Eliminar los la fila txtBoxRow
    $('#' + id).find('.txtBoxRow').remove();
}

function ImgAccAnadir(imgAcc, id)
{
    if(imgAcc.eq(0).is(':hidden')) {
        // Entrar en modo de adicion
        imgAcc.eq(0).show(); // Cancelar
        imgAcc.eq(2).hide(); // Eliminar
        imgAcc.eq(3).hide(); // Editar
        // Ocultar elementos
        $('#' + id + ' tr').has('input[type="radio"]').hide();
        // Agregar textbox
        tr = $('#' + id + ' tr:first')[0];
        $('#' + id + ' tr:last').after(GenerarTr(tr.childElementCount));
        // Deshabilitar FK_id
        column = FindValue(tr, 'FK_');
        if(column != -1) {
            fkInput = $('#' + id + ' tr.txtBoxRow td').eq(column).children();
            fkInput.attr('disabled', true);
            fkId = $('#' + id + ' div.accordion span').attr('data-padre');
            fkId = $('#' + fkId + ' div.panel form.tabla table input[type="radio"]:checked').val();
            fkInput.val(fkId);
        }
    }
    else {
        // Verificar que la informacion ingresada sea correcta
        // y mandar a la BD
        lastId = IngresarElemento(id);
        if(lastId != -1)
        {
            // Agregar fila a la tabla
            // Pasar los textbox(input) a div.label
            InputToDivLabel(id, lastId);
            // Salir de modo de adicion
            ImgAccCancelar(imgAcc, id);
        }
        else {
            // No se pudo hacer la adicion
            // No cumple el filtro, error en MySql
            // Mostrar mensaje
            alert('Error en la insercion');
        }
    }
}

function ImgAccEliminar(imgAcc, id)
{
    // Elimiar fila y su registro en la BD
    // A la vez, elimina a sus hijos

}

function ImgAccEditar(imgAcc, id)
{

    // Cambiar las celdas por textbox, para que se puedan
    // modificar los valores
    tr = $('#' + id + ' div.panel form.tabla table tr').has('input[type="radio"]:checked');
    tr.find('td').has('div.label').each(function(){
    	$(this).html('<input type="text" value="' + $(this).children().text() + '">');
    });
}

function ImgAccGuardar(imgAcc, id)
{

}

function ImgAccTodo(imgAcc, id)
{
    // Icono unicamente mostrado en la relacion NM
    // Enciende/Apaga todos los check box
    checkBox = $('#' + id + ' input[type="checkbox"]');
    if(checkBox.length > 0) {
        // Aunque sea uno apagado, encender todos
        if(checkBox.filter(':checked').length > 0) {
            checkBox.prop('checked', true);
        }
        // Todos encendidos, apagar todo
        else {
            checkBox.prop('checked', false);
        }
    }
}

// **********************ImgAccAnadir**********************

// Genera los espacios donde se escribira la informacion
function GenerarTr(veces)
{
    htmlCode = '<tr class="txtBoxRow"><td></td>';
    htmlCode += '<td class="celda"><input type="text"></td>'.repeat(veces - 1);
    htmlCode += '</tr>';
    return htmlCode;
}

// Encuentra el index
// FindValue(htmlTr, string)
function FindValue(tr, val)
{
    for(i = 0; i < tr.childElementCount; i++) {
        if(tr.children[i].innerText.trim().indexOf(val) != -1) {
            return i;
        }
    }
    return -1;
}

// Lee la informacion en los text box, valida, y crea la cadena
// para hacer el insert en la BD
function IngresarElemento(id)
{
    if($('#' + id).length == 0) {
        alert('Error: IngresarElemento() - Id inexistente');
        return -1;
    }
    llave = $('#' + id + ' tr.llave td div.label');
    txtBox = $('#' + id + ' tr.txtBoxRow td input');
    if(llave.length != txtBox.length) {
        alert('Error: IngresarElemento() - Distintos tamanos');
        return -1;
    }
    if(llave.length == 0) {
        alert('Error: IngresarElemento() - Fila inexistente o sin elementos');
        return -1;
    }
    if(ValidarDatos(llave, txtBox, id)) {
        lastId = -1;
        SqlInsert(GenerarSqlInsert(llave, txtBox)).done(function(result){
            result = parseInt(result);
            if(!(isNaN(result)))
            {
                lastId = result;
            }
        });
        return lastId;
    }
    else {
        alert('IngresarElemento() - Datos invalidos');
        return -1;
    }
}

function InputToDivLabel(id, lastId)
{
    tr = $('#' + id + ' tr.txtBoxRow');
    tr.removeClass('txtBoxRow');
    tr.children('td').has('input').each(function(){
        $(this).html('<div class="label">' + $(this).children().val() + '</div>');
    });
    tr.children().first().html('<input type="radio" name="radioBtn_' + id + '" value="' + lastId + '">');
}

// Validar los datos ingresados
function ValidarDatos(llaveTr, txtBoxTr, id)
{
    return true;
}

// Genera la cadena de insercion
function GenerarSqlInsert(llave, txtBox)
{
    // (column1, column2, ..., columnk)
    column = '(' + llave.first().text();
    // (value1, value2, ..., valuek)
    value = '("' + txtBox.first().val();
    for(i = 1; i < llave.length; i++) {
        column += ', ' + llave.eq(i).text();
        value += '", "' + txtBox.eq(i).val();
    }
    column += ')';
    value += '")';
    sqlInsert = 'INSERT INTO ' + id + ' ' + column + ' VALUES ' + value;
    return sqlInsert;
}

// Llama a la funcion de PHP para hacer la insercion
// Regresa el numero de filas modificadas {0, 1}
function SqlInsert(sqlInsert)
{
    return $.ajax({
        url: 'PHPFunciones/InsertarElemento.php',
        type: 'get',
        data: {sqlInsert: sqlInsert},
        async: false
    });
}

// ********************************************************
