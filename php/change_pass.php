<?php

include_once 'bd.php';
include_once 'user_session.php';
include_once 'user.php';

$userSession = new UserSession();
$user_Session = $userSession->getCurrentUser();
$userT = new User();

$passac= $_POST['passac'];
$passn= $_POST['passn'];
$conpassn= $_POST['conpassn'];

/* $query3 = $this->connect()->prepare("SELECT pass FROM users WHERE correo = :correo");
$query3->execute(['correo' => $userSession]);
$_pass = $query3->fetch(PDO::FETCH_ASSOC); */
$_pass = $userT->getPass($user_Session);
if($_pass !== ''){
    if($passac !== '' && $passn !== '' && $conpassn !== '') {
        //$_pass = $query2['pass'];
        $verify = hash('sha512', $passac);
        if(password_verify($verify, $_pass)){
            if($conpassn == $passn) {
                $passn = password_hash(hash('sha512', $passn), PASSWORD_DEFAULT);
                /* $update = $this->connect()->prepare("UPDATE users SET pass = :pass WHERE user = :userSession");
                $update->execute(['pass' => $passn, 'userSession' => $user_Session]); */
                $update = $userT->setPass($user_Session, $passn);
                if($update->rowCount()){
                    echo '
                    <script>
                        alert("Contraseña actualizada correctamente, vuelve a inicar sesion");
                    </script>
                    ';
                    $userSession->closeSession();
                    header("Refresh: 0.5; URL=../index.php");
                    //header("location: ../index.php");
                }else{
                    echo '
                    <script>
                    alert("Oh no, tenemos un problema :(");
                    </script>
                    ';
                    header("Refresh: 0.5; URL=../index.php");
                   /*  header("location: ../index.php"); */
                    /* $claves = 
                    '<script>
                        alert("Oh no, tenemos un problema :(");
                    </script>'; */
                }
            }else{
                echo '
                <script>
                    alert("Las contraseñas no coinciden, verifique e intentelo nuevamente");
                </script>
                ';
                header("Refresh: 0.5; URL=../index.php");
                /* header("location: ../index.php"); */
                /*  $claves = '<script>
                    alert("Las contraseñas no coinciden, verifique e intentelo nuevamente");
                </script>'; */
            }
        }else{
            echo '
            <script>
            alert("Contraseña incorrecta, verifique e intentelo nuevamente");
            </script>
            ';
            header("Refresh: 0.5; URL=../index.php");
            /* $claves = '<script>
                alert("Contraseña incorrecta, verifique e intentelo nuevamente");
            </script>'; */
            //Contraseña incorrecta
        }
    }
}

?>