<?php
session_start();
include 'bd.php';
$correo= $_POST['correo'];

$pass= $_POST['pass'];
$validar_login = mysqli_query($conexion, "SELECT * FROM users WHERE correo='$correo'");
$row = $validar_login ->fetch_assoc();

if (mysqli_num_rows($validar_login)>0) {
    $row = $validar_login ->fetch_assoc();
    $_pass = $row['pass'];
    $verify = hash('sha512', $pass);    
    if(password_verify($verify, $_pass)) {
        $_SESSION['user']=$correo;
        header("location: ../index.html");
        exit;
    }else{
	header("location: ../index.php");
        echo '
        <script>
        alert("usuario o contraseña incorrecta, veririfica los datos nuevamente");
        </script>
        ';
        exit;
        }
}else{
    header("location: ../index.php");
    echo '
    <script>
    alert("usuario inexistente, veririfica los datos nuevamente");
    </script>
    ';
    exit;
}
?>