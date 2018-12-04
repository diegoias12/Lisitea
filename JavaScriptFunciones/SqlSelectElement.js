function CargarContenido()
{
    $(document).ready(function(){
        // <p> </p>

        // <select> </select>
        $('select.select-cb').each(function(){
            htmlSelect = $(this);
            SqlSelectComboBox($(this).attr('data-tabla'), $(this).attr('data-llave')).done(function(result){
                htmlSelect.html(result);
            });
        });
    });
}
