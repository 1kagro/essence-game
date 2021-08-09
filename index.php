<?php

include_once 'php/user.php';
include_once 'php/user_session.php';

$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    //echo "Hay sessión";
    $user->setCorreo($userSession->getCurrentUser());
    include_once 'home.php';

}else if(isset($_POST['correo']) && isset($_POST['pass'])){
    //echo "Validación de login";
    $userForm = $_POST['correo'];
    $passForm = $_POST['pass'];

    if($user->userExist($userForm, $passForm)){
        //echo "usuario validado";
        $userSession->setCurrentUser($userForm);
        $user->setCorreo($userForm);

        include_once 'home.php';
    }else{
        //echo "nombre de usurio y/o passwor incorrecto";
        $error_login = "Correo electronico y/o password es incorrecto";
        include_once 'login.php';
    }
}else{
    //echo "Login";
    include_once 'login.php';
}
?>