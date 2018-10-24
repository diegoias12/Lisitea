<!doctype html>

<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false)
    {
        header("Location: /Lisitea/index.php");
    }
?>

<html>
<head>
    <title>Creacion - CECyTEM Tequixquiac</title>
    <link rel="stylesheet" type="text/css" href="../CSSEstilos/General.css"/>
    <link rel="stylesheet" type="text/css" href="../CSSEstilos/Menu.css"/>
    <script type="text/javascript" src="../JavaScriptFunciones/Menu.js"></script>
</head>

<body>
    <div id="Menu">
        <?php require '../PHPInclude/Menu.php'; ?>
    </div>
</body>
</html>
