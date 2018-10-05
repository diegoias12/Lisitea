function AbrirMenu() {
    document.getElementById('MenuLateral').style.width = "250px";
    document.getElementById('Contenido').style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function CerrarMenu() {
    document.getElementById('MenuLateral').style.width = "0";
    document.getElementById('Contenido').style.marginLeft = "40px";
    document.body.style.backgroundColor = "rgb(38,255,212)";
}

var espacioVacio
= '<td>'
+   '<p><span>&nbsp;</span></p>'
+ '</td>';

function AgregarEspaciosVacios(clase, cantidad)
{
    var areaLlenado = '';
    for( var i = 0; i < cantidad; i++ )
    {
        areaLlenado += espacioVacio;
    }
    var llenado = document.getElementsByClassName(clase);
    for( var i = 0; i < llenado.length; i++ )
    {
        llenado[i].innerHTML = areaLlenado;
    }
}

function AgregarCodigo()
{
    AgregarEspaciosVacios('LlenadoC', 6);
    AgregarEspaciosVacios('LlenadoD', 4);
    AgregarEspaciosVacios('LlenadoE', 4);
    AgregarEspaciosVacios('LlenadoF', 4);
    var apartadosC
    = '<tr>'
    +   '<td class="Subrequerimiento" rowspan="2" width="8%">'
    +       '<p><span>Nivel taxon&oacute;mico de Marzano</span></p>'
    +   '</td>'
    +   '<td class="Subrequerimiento" rowspan="2" width="36%">'
    +       '<p>Actividades</p>'
    +   '</td>'
    +   '<td class="Subrequerimiento" colspan="2" width="22%">'
    +       '<p>Competencia(s)</p>'
    +   '</td>'
    +   '<td class="Subrequerimiento" rowspan="2" width="16%">'
    +       '<p>Producto(s) de Aprendizaje</p>'
    +   '</td>'
    +   '<td class="Subrequerimiento" rowspan="2">'
    +       '<p>Evaluaci&oacute;n<br>Tipo Instrumento Indicadores de logro</p>'
    +   '</td>'
    + '</tr>'
    + '<tr>'
    +   '<td class="Subrequerimiento">'
    +       '<p>Gen&eacute;rica(s) y sus atributos</p>'
    +   '</td>'
    +   '<td class="Subrequerimiento">'
    +       '<p>Disciplinar(es)/Profesional(es)</p>'
    +   '</td>'
    + '</tr>';
    var apartados = document.getElementsByClassName('Apartados');
    for( var i = 0; i < apartados.length; i++ )
    {
        apartados[i].innerHTML = apartadosC;
    }
}
