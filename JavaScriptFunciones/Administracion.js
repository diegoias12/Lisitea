function myFun()
{
    /*
    alert(RemoveSubstr('tbl_modulo', 'tbl_'););
    alert(RemoveSubstr('aabbcc', 'ab'););
    alert(RemoveSubstr('abc', 'd'););
    */
    /*
    alert(GetTdIndex('tbl_especialidad', 'FK_id'));
    alert(GetTdIndex('tbl_modulo', 'FK_id_especialidad'));
    alert(GetTdIndex('tbl_submodulo', 'FK_id_modulo'));
    */
}

function CrearTabla(strTabla)
{
    if(strTabla == '' || $('#' + strTabla).length == 0)
    {
        alert('Error: CrearTabla() 1');
        return;
    }
    $(document).ready(function(){
        $.ajax({
            url: 'PHPFunciones/CargarTabla.php',
            type: 'get',
            data: {tabla: strTabla},
            success: function(HtmlTabla){
                $('#' + strTabla + ' form.tabla').html(HtmlTabla);
            }
        });
    });
}

function MostrarSeccion(tabla, padre)
{
    $(document).ready(function(){
        $('#' + padre + ' input[type="radio"]').change(function(){
            // Mostrar seccion
            $('#' + tabla + '.seccion').show();
            // Reiniciar radio buttons
            //$('#' + tabla).has('input[type="radio"]').attr('checked', false);
        });
    });
}

function AcordeonListener(tabla)
{
    $(document).ready(function(){
        $('#' + tabla + ' :button.accordion').click(function(){
            $(this).next('div.panel').toggle(0);
        });
    });
}

function RadioBtnListener(tabla, padre)
{
    $(document).ready(function(){
        $.when($.ajax(AcordeonListener(padre))).then(function(){
            $.when($.ajax(CrearTabla(padre))).then(function(){
                if(tabla == '' || $('#' + tabla + '.seccion').length == 0) {

                }
                else {
                    MostrarSeccion(tabla, padre);
                }
            });
        });
    });
}

// **********

function AnadirElemento(tabla)
{
    $(document).ready(function(){
        if(tabla == '' || $('#' + tabla).length == 0)
        {
            alert('Error: AnadirElemento()');
            return;
        }
        /*
        // Crear string de HTML
        htmlStr = '<tr>';
        length =
        for
        htmlStr .= '</tr>';
        // Añadir los textbox a la tabla
        row = $('#' + tabla + ' tr');
        row.last().after();
        */
    });
}

function RadioBtnListenerNM(tabla, padre, relacion)
{
    $(document).ready(function(){
        if(tabla == '' || padre == '' || relacion == '' ||
            $('#' + tabla).length == 0 || $('#' + padre).length == 0)
        {
            alert('Error: AddRadioBtnListenersNM()');
            return;
        }
        $.when($.ajax(AcordeonListener(padre))).then(function(){
            $.when($.ajax(CrearTabla(padre))).then(function(){
                if(tabla == '' || $('#' + tabla + '.seccion').length == 0) {

                }
                else {
                    MostrarSeccion(tabla, padre);
                }
            });
        });
    });
}


function GetTdIndex(tr, value)
{
    if(tr == '' ||
        $('#' + tr).length == 0 || typeof value != "string")
    {
        alert('Error: GetTdIndex()');
    }
    tr = $('#' + tr + ' tr').first()[0];
    for(var i = 0; i < tr.childElementCount; i++)
    {
        if(tr.children[i].innerText.trim() == value)
        {
            return i;
        }
    }
    return -1;
}

function RemoveSubstr(str, substr)
{
    if(!(typeof str == "string" && typeof substr == "string"))
    {
        alert('Error: RemoveSubstr()');
        return;
    }
    var indexA = str.indexOf(substr);
    if(indexA == -1)
    {
        return str;
    }
    var indexB = indexA + substr.length;
    var a = str.substr(0, indexA);
    var b = str.substr(indexB, str.length - indexB);
    return a + b;
}
