<?php
    session_start();
    $email = "mail@mail.com";
    $psw = "pass";
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
    {
        header('Location: /HTMLVentanas/Inicio.php');
    }
    if(isset($_POST['email']) && isset($_POST['psw']))
    {
        if($_POST['email'] == $email && $_POST['psw'] == $psw )
        {
            $_SESSION['loggedin'] = true;
            header('Location: /HTMLVentanas/Inicio.php');
        }
    }
?>
