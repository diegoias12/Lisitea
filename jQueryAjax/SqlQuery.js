// Llama una funcion PHP para poder actualizar un elemento de la tabla
function SqlUpdate(strSqlUpdate)
{
    return $.ajax({
        url: 'PHPFunciones/SqlUpdate.php',
        type: 'post',
        data: {sqlUpdate: strSqlUpdate},
        async: false
    });
}

// Llama una funcion PHP para eliminar lo que viene en la cadena
function SqlDelete(strSqlDelete)
{
    return $.ajax({
        url: 'PHPFunciones/SqlDelete.php',
        type: 'post',
        data: {sqlDelete: strSqlDelete},
        async: false
    });
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

// Llama la funcion en PHP para cargar la tabla
// Crea los filtros de relacion padre-hijo y relacion NM
function CrearTabla(strTabla, strPadre, intPadreId, strRelacion)
{
    if(strTabla == '' || $('#' + strTabla + ' form.tabla').length == 0) {
        alert('Error: CrearTabla()');
        return;
    }
    $.ajax({
        url: 'PHPFunciones/SqlCreateTable.php',
        type: 'post',
        data: {tabla: strTabla, padre: strPadre, padreId: intPadreId, relacion: strRelacion},
        async: false,
        success: function(htmlTabla){
            $('#' + strTabla + ' form.tabla').html(htmlTabla);
        }
    });
}

//
function SqlSelectComboBox(tabla, llave)
{
    if(tabla == '' || llave == '') {
        alert('Error: SqlSelectComboBox()');
        return;
    }
    return $.ajax({
        url: 'PHPFunciones/SqlSelectComboBox.php',
        type: 'post',
        data: {tabla: tabla, llave: llave},
        async: false
    });
}

function SqlSelectP(tabla, llave, id)
{
    if(tabla == '' || llave == '' || id < 0) {
        alert('Error: SqlQuery.js - SqlSelectP()');
        return;
    }
    return $.ajax({
        url: 'PHPFunciones/SqlSelectP.php',
        type: 'post',
        data: {tabla: tabla, llave: llave, id: id},
        async: false
    });
}
