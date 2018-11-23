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

function AddRadioBtnListeners(tabla, padre)
{
    if(tabla === '' || padre === '')
    {
        return;
    }
    $(document).ready(function(){
        $('#' + padre + ' input[type="radio"]').change(function(){
            var id = $('#' + padre + ' input[type="radio"]:checked').val();
            $('#' + tabla).css('display', 'inline');
            // Reset radio buttons
            var radioBtn = $('#' + tabla + ' input[type="radio"]').first();
            radioBtn.prop('checked', true);
            radioBtn.prop('checked', false);
            // Filtrar FK_id_"padre"
            var fk = 'FK_id_' + RemoveSubstr(padre, 'tbl_');
            var column = GetTdIndex(tabla, fk);
            if(column == -1)
            {
                return;
            }
            row = $('#' + tabla + ' tr');
            for(var i = 1; i < row.length; i++)
            {
                if(row[i].children[column].innerText.trim() == id)
                {
                    row[i].style.display = "table-row";
                }
                else
                {
                    row[i].style.display = "none";
                }
            }
        });
    });
}

function RemoveSubstr(str, substr)
{
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

function GetTdIndex(tr, value)
{
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
