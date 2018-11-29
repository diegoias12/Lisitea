// Activa la funcionalidad de todos los imgAccion
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
                case 'CheckBox':
                    ImgAccCheckBox(imgAcc, id);
                    break;
            }
        });
    });
}

// ********************************************************

// Funcionalidad de cancelar
// Sale del modo adicion, borrado, edicion y checkBox
// Reestableciendo todo a la tabla original
function ImgAccCancelar(imgAcc, id)
{
    // Salir de modo de adicion
    // Ocultar y mostrar imgAccion
    imgAcc.hide();
    imgAcc.eq(1).show(); // Anadir
    if($('#' + id).has('input[type="radio"]:checked').length > 0) {
        imgAcc.eq(2).show(); // Eliminar
        imgAcc.eq(3).show(); // Editar
    }
    if(typeof $('#' + id + ' div.accordion span').attr('data-relacion') == 'string') {
        imgAccion.eq(6).show(); // Checkbox
    }
    // Mostrar las filas previamente ocultadas
    $('#' + id + ' tr').has('input[type="radio"]').show();
    // Eliminar la fila txtBoxRow
    $('#' + id).find('.txtBoxRow').remove();
}

// Funcionalidad de anadir
// Se muestran textBox donde se puede introducir la informacion
// que se desea enviar a la BD
function ImgAccAnadir(imgAcc, id)
{
    if(imgAcc.eq(0).is(':hidden')) {
        // Entrar en modo de adicion
        imgAcc.hide();
        imgAcc.eq(0).show(); // Cancelar
        imgAcc.eq(1).show(); // Anadir
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

// Funcionalidad de eliminar
// Cambia los radioButton por checkBox para poder seleccionar
// los elementos que se quieren eliminar
function ImgAccEliminar(imgAcc, id)
{
    // Mostrar imgAccion
    imgAcc.hide();
    imgAcc.eq(0).show(); // Cancelar
    imgAcc.eq(2).show(); // Eliminar
    imgAcc.eq(5).show(); // Todo
}

// Funcionalidad de editar
// La fila seleccionada cambia sus div.label por textBox
// En los cuales se puede modificar la informacion y guardar
function ImgAccEditar(imgAcc, id)
{
    // Mostrar imgAccion
    imgAcc.hide();
    imgAcc.eq(0).show(); // Cancelar
    imgAcc.eq(4).show(); // Guardar
    // Cambiar las celdas por textbox, para que se puedan
    // modificar los valores
    tr = $('#' + id + ' div.panel form.tabla table tr').has('input[type="radio"]:checked');
    tr.find('td').has('div.label').each(function(){
    	$(this).html('<input type="text" value="' + $(this).children().text() + '">');
    });
}

// Funcionalidad de guardar
// Al momento de editar o usar checkBox, se guardaran los cambios
// y llama a ImgAccCancelar para reestablecer la tabla
function ImgAccGuardar(imgAcc, id)
{

}

// Funcionalidad de todo
// Si hay checkBox, selecciona o deselecciona todos
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

// Funcionalidad de checkBox
// Usado en las relaciones NM, facilita la insercion de relaciones entre
// dos tablas, muestra todos los elementos y los radioBtn se cambian por
// checkBox, se seleccionan los elementos que se quieren relacionar con
// el id de la tabla padre
function ImgAccCheckBox(imgAcc, id)
{
    // Mostrar imgAccion
    imgAcc.hide();
    imgAcc.eq(0).show(); // Cancelar
    imgAcc.eq(4).show(); // Guardar
    imgAcc.eq(5).show(); // Todo
    // Guardar los Id's relacionados con el Id padre
    idSet = new Set();
    $('#' + id + ' div.panel form.tabla input[type="radio"]').each(function(){
        idSet.add($(this).val());
    });
    // Mostrar toda la tabla
    $.when($.ajax(CrearTabla(id))).then(function(){
        // Cambiar radio por checkbox
        $('#' + id + ' div.panel form.tabla input[type="radio"]').attr('type', 'checkbox');
        // Marcar los que estan relacionado
        $('#' + id + ' div.panel form.tabla input[type="checkbox"]').each(function(){
            if(idSet.has($(this).val())) {
                $(this).attr('checked', true);
                idSet.delete($(this).val());
            }
        });
    });
}

// **********************ImgAccAnadir**********************

// Genera las celdas con input al momento de hacer una adicion
// GenerarTr(int)
function GenerarTr(veces)
{
    htmlCode = '<tr class="txtBoxRow"><td></td>';
    htmlCode += '<td class="celda"><input type="text"></td>'.repeat(veces - 1);
    htmlCode += '</tr>';
    return htmlCode;
}

// Encuentra el index de un elemento en una fila
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
// IngresarElemento(string)
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
    if(ValidarDatos(llave, txtBox)) {
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

// La fila que fue agregada en el modo adicion, se mete dentro de la tabla
// InputToDivLabel(string, int)
function InputToDivLabel(id, lastId)
{
    tr = $('#' + id + ' tr.txtBoxRow');
    tr.removeClass('txtBoxRow');
    tr.children('td').has('input').each(function(){
        $(this).html('<div class="label">' + $(this).children().val() + '</div>');
    });
    tr.children().first().html('<input type="radio" name="radioBtn_' + id + '" value="' + lastId + '">');
}

// Validar los datos ingresados, ya sea el tipo de dato, o si acepta null
// Se tiene la fila con los llaves (primer fila) y la fila que se genero
// al momento de entrar en el modo insercion
// ValidarDatos(htmlTr, htmlTr, string)
function ValidarDatos(llaveTr, txtBoxTr)
{
    return true;
}

// Genera codigo de MySql para hacer el Insert
// GenerarSqlInsert(htmlTr, htmlTr)
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
// Regresa el ultimo Id generado
// SqlInsert(string)
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
