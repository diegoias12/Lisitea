// Activa la funcionalidad de todos los imgAccion
function ImgAccionListener()
{
    $(document).ready(function(){
        $('img.accion').on('click', function() {
            // Utilza el mismo nombre de la imagen
            // 'Imagenes/' tiene 9 caracteres
            // '.png' tiene 4 caracteres
            srcImg = $(this).attr('src');
            tipo = srcImg.substr(9, srcImg.length - 9 - 4);
            id = $(this).closest('div.seccion').attr('id');
            imgAcc = $('#' + id + ' img.accion');
            tabla = $('#' + id + ' div.panel form.tabla table');
            llave = tabla.find('tr.llave td div.label');
            switch(tipo) {
                case 'Cancelar':        // 0
                    ImgAccCancelar();
                    break;
                case 'Anadir':          // 1
                    ImgAccAnadir();
                    break;
                case 'Eliminar':        // 2
                    ImgAccEliminar();
                    break;
                case 'Editar':          // 3
                    ImgAccEditar();
                    break;
                case 'Guardar':         // 4
                    ImgAccGuardar();
                    break;
                case 'Todo':            // 5
                    ImgAccTodo();
                    break;
                case 'CheckBox':        // 6
                    ImgAccCheckBox();
                    break;
            }
        });
    });
}

// ********************************************************

// Funcionalidad de cancelar
// Sale del modo adicion, borrado, edicion y checkBox
// Reestableciendo todo a la tabla original
function ImgAccCancelar()
{
    // Realizar la accion dependiendo del modo
    //
    // Modo insercion
    if(imgAcc.eq(1).is(':visible')) { // Anadir
        // Mostrar las filas previamente ocultadas
        tabla.find('tr').has('input[type="radio"]').show();
        // Eliminar la fila txtBoxRow
        tabla.find('.txtBoxRow').remove();
    }
    // Modo checkBox
    else if(imgAcc.eq(5).is(':visible')) { // Todo
        // Marcar los id que se encuentren en idSet
        tabla.find('input[type="checkbox"]').each(function(){
            $(this).prop('checked', idSet.has($(this).val()));
        });
        // Se eliminan las filas que no esten marcadas
        tabla.find('tr').has('input[type="checkbox"]:not(:checked)').remove();
        // Los checkbox se regresan a radio
        tabla.find('input[type="checkbox"]').attr('type', 'radio');
        // Desmarcar los radio button
        tabla.find('input[type="radio"]').prop('checked', false);
    }
    // Modo edicion
    else {
        // Retomar los valores originales
        i = 0;
        tabla.find('input[type="text"]').each(function(){
            $(this).val(originalValue[i++]);
        });
        ReinicarEditar();
    }
    ReiniciarImgAcc();
}

// Funcionalidad de anadir
// Se muestran textBox donde se puede introducir la informacion
// que se desea enviar a la BD
function ImgAccAnadir()
{
    if(imgAcc.eq(0).is(':hidden')) { // Cancelar
        // Modo de adicion
        imgAcc.hide();
        imgAcc.eq(0).show(); // Cancelar
        imgAcc.eq(1).show(); // Anadir
        // Ocultar elementos
        tabla.find('tr').has('input[type="radio"]').hide();
        // Agregar textbox
        tabla.find('tr:last').after(GenerarTrInput(llave.length));
        // Deshabilitar FK_id
        column = FindValue(llave, 'FK_');
        if(column != -1) {
            fkInput = tabla.find('tr.txtBoxRow td.celda').eq(column).children().attr('disabled', true);
            fkId = $('#' + id + ' div.accordion span').attr('data-padre');
            fkId = $('#' + fkId + ' div.panel form.tabla table input[type="radio"]:checked').val();
            fkInput.val(fkId);
        }
    }
    // Modo
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
            ImgAccCancelar();
        }
        else {
            // No se pudo hacer la adicion
            // No cumple el filtro, error en MySql
            // Mostrar mensaje
            alert('Error en la insercion');
            ReiniciarImgAcc();
        }
    }
}

// Funcionalidad de eliminar
// Elimina el elemento seleccionado
function ImgAccEliminar()
{
    SqlDelete(GenerarSqlDelete()).done(function(result){
        // Eliminacion exitosa
        if(result == 'true') {
            tabla.find('tr').has('input[type="radio"]:checked').hide('slow', function(){
                $(this).remove();
            });
        }
        else {
            alert('Error: ImgAccEliminar - MySql error');
        }
    });
}

// Funcionalidad de editar
// La fila seleccionada cambia sus div.label por textBox
// En los cuales se puede modificar la informacion y guardar
function ImgAccEditar()
{
    // Mostrar imgAccion
    imgAcc.hide();
    imgAcc.eq(0).show(); // Cancelar
    imgAcc.eq(4).show(); // Guardar
    // Cambiar las celdas por textbox, para que se puedan
    // modificar los valores
    tr = tabla.find('tr').has('input[type="radio"]:checked');
    originalValue = [];
    tr.find('td').has('div.label').each(function(){
        originalValue.push($(this).children().text());
    	$(this).html('<input type="text" value="' + $(this).children().text() + '">');
    });
    // Deshabilitar el resto de radio button
    tabla.find('input[type="radio"]:not(:checked)').attr('disabled', true);
    // Deshabilitar la celda de la FK, es lo unico que no se puede modificar
    column = FindValue(llave, 'FK_');
    if(column != -1) {
        tabla.find('input[type="text"]').eq(column).attr('disabled', true);
    }
}

// Funcionalidad de guardar
// Al momento de editar o usar checkBox, se guardaran los cambios
// y llama a ImgAccCancelar para reestablecer la tabla
function ImgAccGuardar()
{
    // Guardar CheckBox
    if(imgAcc.eq(5).is(':visible')) { // Todo
        padre = $('#' + id + ' div.accordion span').attr('data-padre');
        relacion = $('#' + id + ' div.accordion span').attr('data-relacion');
        padreId = $('#' + padre + ' div.panel form.tabla input[type="radio"]:checked').val();
        //alert('SqlDelete: ' + GenerarSqlDeleteNM());
        //alert('SqlInsertNM: ' + GenerarSqlInsertNM());
        SqlDelete(GenerarSqlDeleteNM()).done(function(result){
            // Eliminacion exitosa
            if(result == 'true') {
                tabla = $('#' + id + ' div.panel form.tabla table');
                // Ahora que se elimino todo, se conecta
                SqlInsert(GenerarSqlInsertNM());
                // Se eliminan las filas que no esten marcadas
                tabla.find('tr').has('input[type="checkbox"]:not(:checked)').remove();
                // Los checkbox se regresan a radio
                tabla.find('input[type="checkbox"]').attr('type', 'radio');
                // Desmarcar los radio button
                tabla.find('input[type="radio"]').prop('checked', false);
            }
            // Eliminacion fallida
            else {
                alert('Error: ImgAccGuardar - MySql error');
                ImgAccCancelar();
            }
            ReiniciarImgAcc();
        });
    }
    // Guardar edicion
    else {
        SqlUpdate(GenerarSqlUpdate()).done(function(result){
            if(result == 'true') {
                ReinicarEditar();
            }
            else {
                alert('Error: ImgAccGuardar - MySql error');
                ImgAccCancelar();
            }
            ReiniciarImgAcc();
        });
    }
}

// Funcionalidad de todo
// Si hay checkBox, selecciona o deselecciona todos
function ImgAccTodo()
{
    // Icono unicamente mostrado en la relacion NM
    checkBox = tabla.find('input[type="checkbox"]');
    if(checkBox.length == 0) {
        alert('Error: ImgAccTodo()');
        return;
    }
    // Enciende/Apaga todos los check box
    //
    // Todos encendidos, apagar todo
    if(checkBox.filter(':checked').length == checkBox.length) {
        checkBox.prop('checked', false);
    }
    // Aunque sea uno apagado, encender todos
    else {
        checkBox.prop('checked', true);
    }
}

// Funcionalidad de checkBox
// Usado en las relaciones NM, facilita la insercion de relaciones entre
// dos tablas, muestra todos los elementos y los radioBtn se cambian por
// checkBox, se seleccionan los elementos que se quieren relacionar con
// el id de la tabla padre
function ImgAccCheckBox()
{
    // Mostrar imgAccion
    imgAcc.hide();
    imgAcc.eq(0).show(); // Cancelar
    imgAcc.eq(4).show(); // Guardar
    imgAcc.eq(5).show(); // Todo
    // Guardar los Id's relacionados con el Id padre
    idSet = new Set();
    tabla.find('input[type="radio"]').each(function(){
        idSet.add($(this).val());
    });
    // Mostrar toda la tabla
    $.when($.ajax(CrearTabla(id))).done(function(){
        tabla = $('#' + id + ' div.panel form.tabla table');
        // Cambiar radio por checkbox
        tabla.find('input[type="radio"]').attr('type', 'checkbox');
        // Marcar los que estan relacionado
        tabla.find('input[type="checkbox"]').each(function(){
            if(idSet.has($(this).val())) {
                $(this).attr('checked', true);
            }
        });
    });
}

// **********************ImgAccCancelar********************

// Muestra los imgAcc que estan en modo normal,
// es decir, cuando solo se esta visualizando la tabla
function ReiniciarImgAcc()
{
    // Ocultar y mostrar imgAccion
    imgAcc.hide();
    imgAcc.eq(1).show(); // Anadir
    if(tabla.find('input[type="radio"]:checked').length > 0) {
        imgAcc.eq(2).show(); // Eliminar
        imgAcc.eq(3).show(); // Editar
    }
    if(typeof $('#' + id + ' div.accordion span').attr('data-relacion') == 'string') {
        imgAccion.eq(6).show(); // Checkbox
    }
}

// **********************ImgAccAnadir**********************

// Genera las celdas con input al momento de hacer una adicion
// GenerarTrInput(int)
function GenerarTrInput(veces)
{
    htmlCode = '<tr class="txtBoxRow"><td></td>';
    htmlCode += '<td class="celda"><input type="text"></td>'.repeat(veces);
    htmlCode += '</tr>';
    return htmlCode;
}

// Encuentra el index de un elemento en una fila
// FindValue(htmlTr, string)
function FindValue(tr, val)
{
    for(i = 0; i < tr.length; i++) {
        if(tr.eq(i).text().indexOf(val) != -1) {
            return i;
        }
    }
    return -1;
}

// La fila que fue agregada en el modo adicion, se mete dentro de la tabla
// InputToDivLabel(string, int)
function InputToDivLabel(lastId)
{
    tr = tabla.find('tr.txtBoxRow');
    tr.removeClass('txtBoxRow');
    tr.children('td').has('input').each(function(){
        $(this).html('<div class="label">' + $(this).children().val() + '</div>');
    });
    tr.children().first().html('<input type="radio" name="radioBtn_' + id + '" value="' + lastId + '">');
}

// Lee la informacion en los text box, valida, y crea la cadena
// para hacer el insert en la BD
// IngresarElemento(string)
function IngresarElemento()
{
    if($('#' + id).length == 0) {
        alert('Error: IngresarElemento() - Id inexistente');
        return -1;
    }
    txtBox = tabla.find('tr.txtBoxRow td input');
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
        SqlInsert(GenerarSqlInsert()).done(function(result){
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

// Validar los datos ingresados, ya sea el tipo de dato, o si acepta null
// Se tiene la fila con los llaves (primer fila) y la fila que se genero
// al momento de entrar en el modo insercion
// ValidarDatos(htmlTr, htmlTr, string)
function ValidarDatos()
{
    return true;
}

// Genera codigo de MySql para hacer el Insert
// GenerarSqlInsert(htmlTr, htmlTr)
function GenerarSqlInsert()
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
    return 'INSERT INTO ' + id + ' ' + column + ' VALUES ' + value;
}

// Llama a la funcion de PHP para hacer la insercion
// Regresa el ultimo Id generado
// SqlInsert(string)
function SqlInsert(strSqlInsert)
{
    return $.ajax({
        url: 'PHPFunciones/SqlInsert.php',
        type: 'post',
        data: {sqlInsert: strSqlInsert},
        async: false
    });
}

// **********************ImgAccGuardar*********************

// Borra las relaciones entre una tabla padre y una tabla hijo
// de muchos a muchos
// Se requiere usar la tabla que crea las relaciones entre la tabla padre y
// la tabla hijo, ademas del nombre y id seleccionado en la tabla padre
function GenerarSqlDeleteNM()
{
    // Se excluye 'tbl' del nombre del padre
    pfkPadre = 'PFK_id' + padre.substr(3);
    return 'DELETE FROM ' + relacion + ' WHERE ' + pfkPadre + ' = ' + padreId;
}

function SqlDelete(strSqlDelete)
{
    return $.ajax({
        url: 'PHPFunciones/SqlDelete.php',
        type: 'post',
        data: {sqlDelete: strSqlDelete},
        async: false
    });
}

function GenerarSqlInsertNM()
{
    checkboxChecked = tabla.find('input[type="checkbox"]:checked');
    if(checkboxChecked.length == 0)
    {
        return;
    }
    // Se excluye 'tbl' del nombre del padre
    pfkPadre = 'PFK_id' + padre.substr(3);
    pfkTabla = 'PFK_id' + id.substr(3);
    // (column1, column2, ..., columnk)
    column = '(' + pfkPadre + ', ' + pfkTabla + ')';
    // (value1, value2, ..., valuek)
    value = '(' + padreId + ', ' + checkboxChecked.first().val();
    for(i = 1; i < checkboxChecked.length; i++) {
        value += '), (' + padreId + ', ' + checkboxChecked.eq(i).val();
    }
    value += ')';
    return 'INSERT INTO ' + relacion + ' ' + column + ' VALUES ' + value;
}

// **********************ImgAccEliminar********************

// Se genera la cadena para eliminar el elemento
function GenerarSqlDelete()
{
    // Se excluye 'tbl' del nombre de la tabla
    pkTabla = 'PK_id' + id.substr(3);
    idChecked = tabla.find('input[type="radio"]:checked').val();
    return 'DELETE FROM ' + id + ' WHERE ' + pkTabla + ' = ' + idChecked;
}

// **********************ImgAccEditar**********************

// Se genera la cadena para actualizar el elemento
function GenerarSqlUpdate()
{
    if(llave.length == 0) {
        alert('Error: GenerarSqlUpdate()');
        return;
    }
    trInput = tabla.find('input[type="text"]');
    columnValue = llave.first().text() + ' = "' + trInput.first().val() + '"';
    for(i = 1; i < llave.length; i++) {
        columnValue += ', ' + llave.eq(i).text() + ' = "' + trInput.eq(i).val() + '"';
    }
    // Eliminar 'tbl' de id
    pkTabla = 'PK_id' + id.substr(3);
    idChecked = tabla.find('input[type="radio"]:checked').val();
    return 'UPDATE ' + id + ' SET ' + columnValue + ' WHERE ' + pkTabla + ' = ' + idChecked;
}

function SqlUpdate(strSqlUpdate)
{
    return $.ajax({
        url: 'PHPFunciones/SqlUpdate.php',
        type: 'post',
        data: {sqlUpdate: strSqlUpdate},
        async: false
    });
}

function ReinicarEditar()
{
    // Habilitar los radio button
    tabla.find('input[type="radio"]').attr('disabled', false);
    // Volver los input a div.label
    tabla.find('tr').has('input[type="radio"]:checked').children('td.celda').each(function(){
        $(this).html('<div class="label">' + $(this).children().val() + '</div>');
    });
}
