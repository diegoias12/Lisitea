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
    // Salir de modo de adicion
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
    // Mostrar las filas previamente ocultadas
    tabla.find('tr').has('input[type="radio"]').show();
    // Eliminar la fila txtBoxRow
    tabla.find('.txtBoxRow').remove();
}

// Funcionalidad de anadir
// Se muestran textBox donde se puede introducir la informacion
// que se desea enviar a la BD
function ImgAccAnadir()
{
    if(imgAcc.eq(0).is(':hidden')) {
        // Entrar en modo de adicion
        imgAcc.hide();
        imgAcc.eq(0).show(); // Cancelar
        imgAcc.eq(1).show(); // Anadir
        // Ocultar elementos
        tabla.find('tr').has('input[type="radio"]').hide();
        // Agregar textbox
        tr = tabla.find('tr:first')[0];
        tabla.find('tr:last').after(GenerarTr(tr.childElementCount));
        // Deshabilitar FK_id
        column = FindValue(tr, 'FK_');
        if(column != -1) {
            fkInput = tabla.find('tr.txtBoxRow td').eq(column).children();
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
            ImgAccCancelar();
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
function ImgAccEliminar()
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
function ImgAccEditar()
{
    // Mostrar imgAccion
    imgAcc.hide();
    imgAcc.eq(0).show(); // Cancelar
    imgAcc.eq(4).show(); // Guardar
    // Cambiar las celdas por textbox, para que se puedan
    // modificar los valores
    tr = tabla.find('tr').has('input[type="radio"]:checked');
    tr.find('td').has('div.label').each(function(){
    	$(this).html('<input type="text" value="' + $(this).children().text() + '">');
    });
}

// Funcionalidad de guardar
// Al momento de editar o usar checkBox, se guardaran los cambios
// y llama a ImgAccCancelar para reestablecer la tabla
function ImgAccGuardar()
{
    // Guardar CheckBox
    if(imgAcc.eq(5).is(':visible')) { // Todo
        // Para poder crear las nuevas relaciones se hara
        // de una forma un tanto ineficiente por el momento
        // Forma I
        // Se borraran todos los elementos relacionados con
        // el id del padre, y despues se agregaran las conexiones
        // que estan marcadas, basicamente, borrar todo y agregar todo
        //
        // Esta forma sera cambiada por una que mejora el tiempo, pero
        // requiere uso de memoria
        // Forma II
        // Sera almacenar en un set los id's que se encuentran marcados
        // Al finalizar, se agregaran unicamente los id's que no se
        // encuentren en el set, igualmente, solo se borraran
        // los elementos que esten en el set
        //
        // Forma I
        padre = $('#' + id + ' div.accordion span').attr('data-padre');
        relacion = $('#' + id + ' div.accordion span').attr('data-relacion');
        padreId = $('#' + padre + ' div.panel form.tabla input[type="radio"]:checked').val();
        //alert('SqlDelete: ' + GenerarSqlDelete());
        //alert('SqlInsertNM: ' + GenerarSqlInsertNM());
        SqlDelete(GenerarSqlDelete()).done(function(result){
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
                tabla.find('input[type="radio"]').attr('checked', false);
            }
            // Eliminacion fallida
            else {
                alert('Error: ImgAccGuardar - MySql error');
            }
            imgAcc.eq(4).hide(); // Guardar
            imgAcc.eq(5).hide(); // Todo
            imgAcc.eq(6).show(); // CheckBox
        });
    }
    // Guardar Edicion
    else {

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
                idSet.delete($(this).val());
            }
        });
        idSet.clear();
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
    llave = tabla.find('tr.llave td div.label');
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
function GenerarSqlDelete()
{
    // Se excluye 'tbl' del nombre del padre
    pfkPadre = 'PFK_id' + padre.substr(3);
    sql
    = 'DELETE FROM ' + relacion
    + ' WHERE ' + pfkPadre + ' = ' + padreId;
    return sql;
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
