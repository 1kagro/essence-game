<?php

include_once 'bd.php';

class User extends DB{

    private $correo;
    private $nombre;
    private $username;

    public function userExist($user, $pass){
        
        $query2 = $this->connect()->prepare("SELECT * FROM users WHERE correo = :correo");
        $query2->execute(['correo' => $user]);
        $query2 = $query2->fetch(PDO::FETCH_ASSOC);
        
        $verify = hash('sha512', $pass);
        $_pass = $query2['pass'];
        //echo 'pass: ', $_pass, 'passForm: ', $verify;
        //$verify = hash('sha512', $pass);
        $query = $this->connect()->prepare("SELECT * FROM users WHERE correo = :correo AND pass = :pass");
        $query->execute(['correo' => $user, 'pass' => $_pass]);
        if($query->rowCount()){
            if(password_verify($verify, $_pass)) {
                return true;
            }
        }else{
            return false;
        }
    }

    public function setCorreo($correo){
        $query = $this->connect()->prepare("SELECT * FROM users WHERE correo = :correo");
        $query->execute(['correo' => $correo]);

        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nom'];
            $this->correo = $currentUser['correo'];
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare("SELECT * FROM users WHERE user = :user");
        $query->excute(['user' => $user]);

        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nombre'];
            $this->username = $currentUser['user'];
        }
    }

    public function getPass($user){
        $query = $this->connect()->prepare("SELECT pass FROM users WHERE correo = :correo");
        $query->execute(['correo' => $user]);
        $query = $query->fetch(PDO::FETCH_ASSOC);
        return $query['pass'];
    }

    public function setPass($user, $passn){
        $update = $this->connect()->prepare("UPDATE users SET pass = :pass WHERE user = :userSession");
        $update->execute(['pass' => $passn, 'userSession' => $user]);
        return $update;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setData($name, $correo, $user, $pass) {
        $query = $this->connect()->prepare("INSERT INTO users(nom, correo, user, pass) VALUES (:nom,:correo,:user,:pass)");
        $query->execute(['nom' => $name, 'correo' => $correo, 'user' => $user, 'pass' => $pass]);
        return $query;
    }

    public function correoExist($correo) {
        $query = $this->connect()->prepare("SELECT * FROM users WHERE correo= :correo");
        $query->execute(['correo' => $correo]);
        if($query->rowCount()) {
            return true;
        }else{
            return false;
        }
    }
    
    public function userOnlyExist($user) {
        $query = $this->connect()->prepare("SELECT * FROM users WHERE user= :user");
        $query->execute(['user' => $user]);
        if($query->rowCount()) {
            return true;
        }else{
            return false;
        }
    }
}


?>