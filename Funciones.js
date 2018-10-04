function AbrirMenu() {
    document.getElementById('MenuLateral').style.width = "250px";
    document.getElementById('Contenido').style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function CerrarMenu() {
    document.getElementById('MenuLateral').style.width = "0";
    document.getElementById('Contenido').style.marginLeft = "0";
    document.body.style.backgroundColor = "rgb(38,255,212)";
}
