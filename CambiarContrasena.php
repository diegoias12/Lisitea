<!doctype html>

<?php require 'PHPInclude/NegarAcceso.php'; ?>

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
  <div class="aplicacion-main" style="height:500px;padding-top:1px;padding-bottom:1px;">
      <div class="contenedor" align="center" style="margin-top:5%">
          <div class="formato" style="max-width:300px;">
              <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                  <dl class="grupoconformato">
                      <dt class="imput-label">
                          <label class="formato-label1">
                              <font style="vertical-aling:inherit;">
                              Nueva Contraseña
                              </font>
                          </label>
                      </dt>
                      <dd style="margin:0;width:90%;">
                          <input name="psw" type="text" maxlength="40" placeholder="contrase&ntilde;a" class="formato-imput">
                      </dd>
                  </dl>
                  <dl class="grupoconformato">
                      <dt class="imput-label">
                          <label class="formato-label1">
                              <font style="vertical-aling:inherit;">
                              Nueva Contraseña
                              </font>
                          </label>
                      </dt>
                      <dd style="margin:0;width:90%;">
                          <input name="psw" type="text" maxlength="40" placeholder="contrase&ntilde;a" class="formato-imput">
                      </dd>
                  </dl>
                  <dl class="grupoconformato">
                      <dd style="margin:0;width:90%;">
                          <input type="submit" value="Aceptar" class="block">
                      </dd>
                  </dl>
              </form>
          <?php echo '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'; ?>
          </div>
      </div>
  </div>
