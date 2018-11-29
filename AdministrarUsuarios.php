<!doctype html>
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
  <div class="aplicacion-main" style="height:700px;padding-top:1px;padding-bottom:1px;">
      <div class="contenedor" align="center" style="margin-top:5%">
          <div class="formato" style="max-width:300px;">
              <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <dl class="grupoconformato">
                    <dt class="imput-label">
                        <label class="formato-label1">
                            <font style="vertical-aling:inherit;">
                            Nombre del usuario
                            </font>
                        </label>
                    </dt>
                    <dd style="margin:0;width:90%;">
                        <input name="email" type="text" maxlength="40" placeholder="Nombre" class="formato-imput">
                    </dd>
                </dl>
                  <dl class="grupoconformato">
                      <dt class="imput-label">
                          <label class="formato-label1">
                              <font style="vertical-aling:inherit;">
                              Correo Electronico
                              </font>
                          </label>
                      </dt>
                      <dd style="margin:0;width:90%;">
                          <input name="email" type="text" maxlength="40" placeholder="Correo electronico" class="formato-imput">
                      </dd>
                  </dl>
                  <dl class="grupoconformato">
                      <dt class="imput-label">
                          <label class="formato-label1">
                              <font style="vertical-aling:inherit;">
                              CURP
                              </font>
                          </label>
                      </dt>
                      <dd style="margin:0;width:90%;">
                          <input name="psw" type="text" maxlength="40" placeholder="CURP" class="formato-imput">
                      </dd>
                  </dl>
                  <dl class="grupoconformato">
                      <dt class="imput-label">
                          <label class="formato-label1">
                              <font style="vertical-aling:inherit;">
                              Tipo de usuario
                              </font>
                          </label>
                      </dt>
                      <dd style="margin:0;width:90%;">
                          <select name="tipo" class="formato-imput">
                          <option value="a">Revisor</option>
                          <option value="a">Profesor</option>
                          <option value="a">Administrador</option>
                          <option value="a">Capturista</option>
                          <option value="a">Supervisor</option>
                      </dd>
                  </dl>
                  <dl class="grupoconformato" style="margin-top:20px;">
                      <dd style="margin-top:70px;width:90%;">
                          <input type="submit" value="Aceptar" class="block">
                      </dd>
                  </dl>
              </form>
          <?php echo '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'; ?>
          </div>
      </div>
  </div>
