function CargarContenido()
{
    $(document).ready(function(){
        // <p> </p>
        $('p.select-p').each(function(){
            htmlP = $(this);
            tabla = $(this).attr('data-tabla');
            llave = $(this).attr('data-llave');
            ObtenerVariablePHP(tabla, llave).done(function(id){
                SqlSelectP(tabla, llave, id).done(function(result){
                    htmlP.html(result);
                });
            });
        });
        // <select> </select>
        $('select.select-cb').each(function(){
            htmlSelect = $(this);
            tabla = $(this).attr('data-tabla');
            llave = $(this).attr('data-llave');
            SqlSelectComboBox(tabla, llave).done(function(result){
                htmlSelect.html(result);
            });
        });
    });
}
