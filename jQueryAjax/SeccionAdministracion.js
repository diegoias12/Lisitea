function CrearSeccion(tabla, padre, relacion)
{
    if(tabla == '' || padre == '' || relacion == '') {
        alert('Error: ObtenerValor.js');
        return;
    }
    return $.ajax({
        url: 'PHPInclude/SeccionAdministracionDisciplinar.php',
        type: 'get',
        data: {tabla: tabla, padre: padre, relacion: relacion},
        async: false
    });
}
