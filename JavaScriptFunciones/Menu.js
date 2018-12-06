/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
function openNav()
{
    document.getElementsByClassName('MenuLateralAbierto')[0].style.width = "250px";
    document.getElementById('Contenido').style.marginLeft = "250px";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
function closeNav()
{
    document.getElementsByClassName('MenuLateralAbierto')[0].style.width = "0px";
    document.getElementById('Contenido').style.marginLeft = "40px";
}

function FiltrarMenu(tabla, llave)
{
    $(document).ready(function(){
        ObtenerVariablePHP(tabla, llave).done(function(id){
            if(id==1)
            {
                const list = document.getElementsByClassName("PagRevision");
                list[0].style.display = "block";
                list[1].style.display = "block";
            }
            if(id==2)
            {
                const list = document.getElementsByClassName("PagAdministracion");
                const list2 = document.getElementsByClassName("PagUsuarios");
                list[0].style.display = "block";
                list2[0].style.display = "block";
                list[1].style.display = "block";
                list2[1].style.display = "block";
            }
            if(id==3)
            {
                const list = document.getElementsByClassName("PagInicioPE");
                list[0].style.display = "block";
                list[1].style.display = "block";
            }
            if(id==4)
            {
                const list = document.getElementsByClassName("PagAdministracion");
                list[0].style.display = "block";
                list[1].style.display = "block";
            }
        });
    });
}
