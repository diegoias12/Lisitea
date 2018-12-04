<!doctype html>

<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false)
    {
        header("Location: index.php");
    }
?>

<html>
<head>
    <title>Creacion - CECyTEM Tequixquiac</title>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/General.css"/>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/Menu.css"/>
    <link rel="stylesheet" type="text/css" href="CSSEstilos/InicioPE.css"/>
    <script type="text/javascript" src="JavaScriptFunciones/Menu.js"></script>
    <script type="text/javascript" src="JavaScriptFunciones/Planeacion.js"></script>
</head>

<body>
    <div id="Menu">
        <?php require 'PHPInclude/Menu.php'; ?>
    </div>
    <script>
        /*
        function Funcion1(){
          document.getElementById('PagRevision').style.display = "block";
          document.getElementById('PagRevision2').style.display = "block";
          document.getElementById('PagInicioPE').style.display = "none";
          document.getElementById('PagInicioPE2').style.display = "none";
          document.getElementById('PagAdministracion').style.display = "none";
          document.getElementById('PagAdministracion2').style.display = "none";
          document.getElementById('PagUsuarios').style.display = "none";
          document.getElementById('PagUsuarios').style.display = "none";
        }
        function Funcion2(){
          document.getElementById('PagRevision').style.display = "none";
          document.getElementById('PagRevision2').style.display = "none";
          document.getElementById('PagInicioPE').style.display = "none";
          document.getElementById('PagInicioPE2').style.display = "none";
          document.getElementById('PagAdministracion').style.display = "block";
          document.getElementById('PagAdministracion2').style.display = "block";
          document.getElementById('PagUsuarios').style.display = "block";
          document.getElementById('PagUsuarios').style.display = "block";
        }
        function Funcion3(){
          document.getElementById('PagRevision').style.display = "none";
          document.getElementById('PagRevision2').style.display = "none";
          document.getElementById('PagInicioPE').style.display = "block";
          document.getElementById('PagInicioPE2').style.display = "block";
          document.getElementById('PagAdministracion').style.display = "none";
          document.getElementById('PagAdministracion2').style.display = "none";
          document.getElementById('PagUsuarios').style.display = "none";
          document.getElementById('PagUsuarios').style.display = "none";
        }
        function Funcion4(){
          document.getElementById('PagRevision').style.display = "none";
          document.getElementById('PagRevision2').style.display = "none";
          document.getElementById('PagInicioPE').style.display = "none";
          document.getElementById('PagInicioPE2').style.display = "none";
          document.getElementById('PagAdministracion').style.display = "block";
          document.getElementById('PagAdministracion2').style.display = "block";
          document.getElementById('PagUsuarios').style.display = "none";
          document.getElementById('PagUsuarios').style.display = "none";
        }
        function Funcion5(){
          document.getElementById('PagRevision').style.display = "none";
          document.getElementById('PagRevision2').style.display = "none";
          document.getElementById('PagInicioPE').style.display = "none";
          document.getElementById('PagInicioPE2').style.display = "none";
          document.getElementById('PagAdministracion').style.display = "none";
          document.getElementById('PagAdministracion2').style.display = "none";
          document.getElementById('PagUsuarios').style.display = "none";
          document.getElementById('PagUsuarios').style.display = "none";
        }*/
        var x = 1
        if(x==1)
        {
            const list = document.getElementsByClassName("PagRevision");
            list[0].style.display = "block";
        }
        //var x = 2;
        if(x==2)
        {
            document.getElementById('PagAdministracion').style.display = "block";
            document.getElementById('PagAdministracion2').style.display = "block";
            document.getElementById('PagUsuarios').style.display = "block";
            document.getElementById('PagUsuarios2').style.display = "block";
        }
        //var x = 3;
        if(x==3)
        {
            document.getElementById('PagInicioPE').style.display = "block";
            document.getElementById('PagInicioPE2').style.display = "block";
        }
        //var x = 4;
        if(x==4)
        {
            document.getElementById('PagAdministracion').style.display = "block";
            document.getElementById('PagAdministracion2').style.display = "block";
        }
    </script>
    <!--En cso de requeriri un cambio de contraseña
    <div id="Menu2">
        <?php require 'PHPInclude/SolicitarCambioContraseña.php'; ?>
    </div>
    -->
</body>
</html>
