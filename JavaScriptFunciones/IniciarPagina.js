function IniciarAdministracionDisciplinar()
{
    $(document).ready(function(){
        Activa(5);
        RellenarSeccion();
        AccordionListener();
        ImgAccionListener();
    });
}

function RellenarSeccion()
{
    $('.seccion').each(function(){
        seccion = $(this);
        tabla = $(this).attr('id');
        padre = $(this).attr('data-padre');
        relacion = $(this).attr('data-relacion');
        CrearSeccion(tabla, padre, relacion).done(function(result){
            seccion.html(result);
            // Con este listener, las tablas serán mostradas cuando
            // se seleccione alguno de los elementos de su "padre"
            if(typeof padre !== 'undefined') {
                MostrarSeccionListener(tabla, padre);
            }
        });
    });
}
