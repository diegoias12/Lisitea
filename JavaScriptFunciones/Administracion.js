function MostrarDependencia(tabla)
{
    if(tabla == '')
        return;
    // Seleccionar las tablas dependientes
    x = document.getElementById(tabla);
    // Mostrar la tabla
    x.style.display = "inline";
    // Desmarcar los radio button
    rdnBtn = x.getElementsByTagName("input")[0];
    rdnBtn.checked = true;
    rdnBtn.checked = false;
}
