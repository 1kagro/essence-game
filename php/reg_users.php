<?php
include 'bd.php';
$name= $_POST['nom'];
$correo= $_POST['correo'];
$user= $_POST['user'];
$pass= $_POST['pass'];
$pass = hash('sha512', $pass);


$query = "INSERT INTO users(nom, correo, user, pass)
 VALUES ('$name','$correo','$user','$pass') ";

$verificar_correo = mysqli_query($conexion, "SELECT * FROM users WHERE correo='$correo'");

if(mysqli_num_rows($verificar_correo)>0){
    echo '
    <script>
    alert("Este correo ya existe");
    window.location= "../index.php"
    </script>
    ';
    exit();

}

$verificar_user = mysqli_query($conexion, "SELECT * FROM users WHERE user='$user'");

if(mysqli_num_rows($verificar_user)>0){
    echo '
    <script>
    alert("Este nombre de usuario ya existe");
    window.location= "../index.php"
    </script>
    ';
    exit();

}




$ejecutar= mysqli_query($conexion, $query);


if ($ejecutar) {
    echo '
    <script>
    alert("Usuario creado exitosamente");
    window.location= "../index.php"

    
    </script>
    ';
}else{
    echo '
    <script>
    alert("Intentelo mas tarde");
    window.location= "../index.php"

    
    </script>
    ';
}
mysqli_close($conexion);
?>