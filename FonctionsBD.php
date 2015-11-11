<?php
error_reporting(E_ALL);
ini_set("display_errors",1);

function GetConnection() {
    DEFINE("HOST", "127.0.0.1");
    DEFINE("DBNAME", "m151_formulaire");
    DEFINE("USERNAME", "root");
    DEFINE("PASSWORD", "");

    static $dbh = null;
    try {
        if ($dbh == null) {
            $dbh = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, USERNAME, PASSWORD);
        }
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $dbh;
}

function InsertUser($nom, $prenom, $pseudo, $email, $password, $date, $description) {
    if (!empty($nom)) {
        $Hashpassword = sha1(md5(sha1($password . $email)));

        $count = GetConnection()->prepare("INSERT INTO user(nom,prenom,pseudo,email,password,dateNaissance,description) VALUES(:nom, :prenom, :pseudo, :email, :password, :date, :description)");

        $count->bindParam(':nom', $nom, PDO::PARAM_STR);
        $count->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $count->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $count->bindParam(':email', $email, PDO::PARAM_STR);
        $count->bindParam(':password', $Hashpassword, PDO::PARAM_STR);
        $count->bindParam(':date', $date, PDO::PARAM_INT);
        $count->bindParam(':description', $description, PDO::PARAM_STR);

        $count->execute();
    } else {
        echo 'Les champs remplis ne sont pas corrects...';
    }
}

function SelectData() {
    $select = GetConnection()->prepare("SELECT * FROM user");
    $select->execute();
    $table = $select->fetchAll(PDO::FETCH_ASSOC);
    return $table;
}

function GetUser($id) {
    $data = GetConnection()->prepare("SELECT * FROM user WHERE idUser = $id");
    $data->execute();
    $user = $data->fetchAll();
    return $user;
}

function UpdateUser($id, $nom, $prenom, $pseudo, $email, $password, $date, $description) {
    if (!empty($nom)) {
        $Hashpassword = sha1(md5(sha1($password . $email)));
        $count = GetConnection()->prepare("UPDATE user SET nom = :nom, prenom = :prenom, pseudo = :pseudo, email = :email, password = :password, dateNaissance = :date, description = :description WHERE idUser = '$id'");

        $count->bindParam(':nom', $nom, PDO::PARAM_STR);
        $count->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $count->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $count->bindParam(':email', $email, PDO::PARAM_STR);
        $count->bindParam(':password', $Hashpassword, PDO::PARAM_STR);
        $count->bindParam(':date', $date, PDO::PARAM_INT);
        $count->bindParam(':description', $description, PDO::PARAM_STR);

        $count->execute();
    } else {
        echo 'Les champs remplis ne sont pas corrects...';
    }
}

function DeleteUser($id) {
    $delete = GetConnection()->prepare("DELETE FROM user WHERE idUser = '$id'");
    $delete->execute();
}

function Login($email, $password) {
    $Hashpassword = sha1(md5(sha1($password . $email)));

    $count = GetConnection()->prepare("SELECT * FROM user WHERE email='$email' AND password = '$Hashpassword'  LIMIT 1");

    $count->execute();

    $row = $count->fetch(PDO::FETCH_ASSOC);
    return $row;
}
?>