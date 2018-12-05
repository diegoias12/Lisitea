<!doctype html>

<?php require 'PHPInclude/NegarAcceso.php'; ?>

<html>
<head>
    <link rel="icon" href="Imagenes/Lisitea.png">
    <title>Contrase&ntilde;a - CECyTEM Tequixquiac</title>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/Index.css"/>
    <script type="text/javascript" src="JavaScriptFunciones/SqlSelectElement.js"></script>
    <script type="text/javascript" src="jQueryAjax/SqlQuery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <script>CargarContenido();</script>
    <div class="header">
        <img src="Imagenes/GobEdoMex.png" style="height:100px;width:300px;float:left;">
        <img src="Imagenes/CECyTEM.png" style="height:100px;width:100px;float:right;">
    </div>
    <div class="aplicacion-main" style="height:700px;padding-top:1px;padding-bottom:1px;">
        <div class="contenedor" align="center" style="margin-top:5%">
            <div class="formato" style="max-width:300px;">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <dl class="grupoconformato">
                        <dt class="input-label">
                            <label class="formato-label1">
                                <font style="vertical-aling:inherit;">
                                Nombre
                                </font>
                            </label>
                        </dt>
                        <dd style="margin:0;width:90%;">
                            <input name="nombre" type="text" maxlength="40" placeholder="Nombre" class="formato-input">
                        </dd>
                    </dl>
                    <dl class="grupoconformato">
                        <dt class="input-label">
                            <label class="formato-label1">
                                <font style="vertical-aling:inherit;">
                                Correo Electronico
                                </font>
                            </label>
                        </dt>
                        <dd style="margin:0;width:90%;">
                            <input name="email" type="email" maxlength="40" placeholder="Correo electronico" class="formato-input">
                        </dd>
                    </dl>
                    <dl class="grupoconformato">
                        <dt class="input-label">
                            <label class="formato-label1">
                                <font style="vertical-aling:inherit;">
                                CURP
                                </font>
                            </label>
                        </dt>
                        <dd style="margin:0;width:90%;">
                            <input name="curp" type="text" maxlength="40" placeholder="CURP" class="formato-input">
                        </dd>
                    </dl>
                    <dl class="grupoconformato">
                        <dt class="input-label">
                            <label class="formato-label1">
                                <font style="vertical-aling:inherit;">
                                Cargo
                                </font>
                            </label>
                        </dt>
                        <dd style="margin:0;width:90%;">
                            <select class="formato-input select-cb"
                            data-tabla="tbl_tipo_usuario" data-llave="VCH_nombre">
                            </select>
                        </dd>
                    </dl>
                    <dl class="grupoconformato" style="margin-top:20px;">
                        <dd style="margin-top:70px;width:90%;">
                            <input type="submit" value="Aceptar" class="block">
                        </dd>
                    </dl>
                </form>
            </div>
        </div>
    </div>
</body>
