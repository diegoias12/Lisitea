// Obtiene los datos de index.php y verifica que sea un usuario valido

<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = test_input($_POST["email"]);
    $pasw = test_input($_POST["psw"]);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
