<?php
session_start();
include 'bd.php';
$correo= $_POST['correo'];

$pass= $_POST['pass'];
$validar_login = mysqli_query($conexion, "SELECT * FROM users WHERE correo='$correo' and pass='$pass'");

if (mysqli_num_rows($validar_login)>0) {
    $_SESSION['user']=$correo;
    //require_once("../index.html")
    header("location: welcome.php");
    exit;
}else{
    echo '
    <script>
    alert("usuario inexistente, veririfica los datos nuevamente");
    </script>
    ';
    exit;
}
?>