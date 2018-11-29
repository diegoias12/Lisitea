<?php
    // Niega el acceso a toda la pagina, excepto el index
    session_start();
    $_SESSION['loggedin'] = false;
    header("Location: ../index.php");
?>
