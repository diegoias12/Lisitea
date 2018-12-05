<!doctype html>

<?php require 'PHPInclude/RecuperarContrasena.php'; ?>

<html>
<head>
    <title>Contrase&ntilde;a - CECyTEM Tequixquiac</title>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/Index.css"/>
</head>

<body>
  <div class="header">
      <img src="Imagenes/GobEdoMex.png" style="height:100px;width:300px;float:left;">
      <img src="Imagenes/CECyTEM.png" style="height:100px;width:100px;float:right;">
  </div>
    <div class="aplicacion-main" style="height:400px;padding-top:1px;padding-bottom:1px;">
        <div class="contenedor" align="center" style="margin-top:5%">
            <div class="formato" style="max-width:300px;">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <dl class="grupoconformato">
                        <dt class="imput-label">
                            <label class="formato-label1">
                                <font style="vertical-aling:inherit;">
                                Email
                                </font>
                            </label>
                        </dt>
                        <dd style="margin:0;width:90%;">
                            <input name="email" type="email" maxlength="40" placeholder="Correo electr&oacute;nico" class="formato-imput">
                        </dd>
                    </dl>
                    <dl class="grupoconformato">
                        <dd style="margin:0;width:90%;">
                            <input type="submit" value="Recuperar Contrase&ntilde;a" class="block">

                        </dd>
                        <dd style="margin:0;width:90%;">
                            <!--boton para reresar a la ventana de inicio-->
                            <input type="button" value="Cancelar" onclick="funcion1()" class="block" style="margin-top:5px;">
                        </dd>
                    </dl>
                </form>
            <?php echo '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'; ?>
            </div>
        </div>
    </div>
</body>
</html>

<script>
var modal = document.getElementById('myModal');
var span = document.getElementsByClassName("close")[0];
function funcion1() {
    location.href="PHPFunciones/CerrarSesion.php";
}
function funcion2(){
    modal.style.display = "none";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
