function ObtenerVariablePHP(tabla, llave)
{
    if(tabla == '' || llave == '') {
        alert('Error: ObtenerValor.js');
        return;
    }
    return $.ajax({
        url: 'PHPFunciones/ObtenerVariable.php',
        type: 'get',
        data: {tabla: tabla, llave: llave},
        async: false
    });
}
