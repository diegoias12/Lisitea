<?php
    session_start();
    $_SESSION['loggedin'] = false;
    header("Location: /Lisitea/index.php");
?>
