
<?php
session_start();

if (!isset($_SESSION['user'])) {
    echo '
    <script>
    alert("Debes iniciar sesion");
    window.location= "../index.php"
    </script>
    ';
    session_destroy();
    die();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
</head>
<body>
    <h1>GOLAAA</h1>
</body>
</html>