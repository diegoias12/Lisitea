/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
function openNav()
{
    document.getElementsByClassName('MenuLateralAbierto')[0].style.width = "250px";
    document.getElementById("Contenido").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
function closeNav()
{
    document.getElementsByClassName('MenuLateralAbierto')[0].style.width = "0px";
    document.getElementById("Contenido").style.marginLeft = "40px";
    document.body.style.backgroundColor = "#26FFD4";
}
