<?php
session_start();
/*
    @@@@@@@@@@@@@@@@@@@ Diseño @@@@@@@@@@@@@@@@@@
    Usar logos, crear un inicio de sesión amigable
*/
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
    header('Location: Inicio.php');
}
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $_SESSION['loggedin'] = false;
    if(isset($_POST['email']) && isset($_POST['psw']))
    {
        $email = $_POST['email'];
        $psw = $_POST['psw'];
        require 'PHPInclude/Conexion.php';
        try
        {
            $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = 'SELECT PK_id_usuario, FK_id_tipo_usuario '
                 . 'FROM tbl_usuario '
                 . 'WHERE VCH_correo_electronico = "' . $email . '" '
                 . 'AND VCH_contrasenia = "' . $psw . '"';
            $consulta = $conn->query($sql);
            $row = $consulta->fetch();
            if(intval($row['PK_id_usuario']) > 0)
            {
                $_SESSION['usuario'] = intval($row['PK_id_usuario']);
                $_SESSION['tipo_usuario'] = intval($row['FK_id_tipo_usuario']);
                $_SESSION['loggedin'] = true;
                header("Location: Inicio.php");
            }
            else
            {
                echo '<div id="myModal" class="modal" style="display:block;">'
                .     '<div class = "modal-content">'
                .         '<span class="close">&times;</span>'
                .          '<div class="mensaje">'
                .              '<p align="center" style="font-size:25px">Datos incorrectos</p>'
                .          '</div>'
                .          '<center>'
                .              '<button id="accept" class="block" style="padding:5px;width:30%;" onclick="funcion2()">'
                .                  'Aceptar'
                .              '</button>'
                .          '</center>'
                .      '</div>'
                .  '</div>';
            }
        }
        catch(PDOException $e)
        {
            echo "Error: IngresarElemento() - " . $e->getMessage();
        }
        $conn = null;
    }
}
?>
