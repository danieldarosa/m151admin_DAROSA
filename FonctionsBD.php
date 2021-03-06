<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

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

function InsertUser($nom, $prenom, $pseudo, $email, $password, $date, $classe, $description) {
    if (!empty($nom)) {
        $Hashpassword = sha1(md5(sha1($password . $email)));

        $count = GetConnection()->prepare("INSERT INTO user(nom,prenom,pseudo,email,password,dateNaissance,description,idClasse) VALUES(:nom, :prenom, :pseudo, :email, :password, :date, :description,'$classe')");

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
    $select = GetConnection()->prepare("SELECT * FROM user NATURAL JOIN classes");
    $select->execute();
    $table = $select->fetchAll(PDO::FETCH_ASSOC);
    return $table;
}

function GetUser($id) {
    $data = GetConnection()->prepare("SELECT * FROM user NATURAL JOIN classes WHERE idUser = $id");
    $data->execute();
    $user = $data->fetchAll();
    return $user;
}

function UpdateUser($id, $nom, $prenom, $pseudo, $email, $password, $date, $classe, $description) {
    if (!empty($nom)) {
        $Hashpassword = sha1(md5(sha1($password . $email)));
        $count = GetConnection()->prepare("UPDATE user SET nom = :nom, prenom = :prenom, pseudo = :pseudo, email = :email, password = :password, dateNaissance = :date, description = :description, idClasse = '$classe' WHERE idUser = '$id'");

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

function SelectClasse() {
    $count = GetConnection()->exec('SET NAMES utf8');
    $count = GetConnection()->prepare("SELECT * FROM classes ");
    $count->execute();

    while ($row = $count->fetch(PDO::FETCH_ASSOC)) {
        echo '<option value="' . $row['idClasse'] . '">' . $row['label'] . '</option><br/>';
    }
}

function InsertStudent($nom, $prenom, $football, $streetball, $beachvolley, $frisbee, $idClass) {
    if(!empty($nom)) {
        $count = GetConnection()->prepare("INSERT INTO eleves(nom,prenom,idClasse) VALUES (:nom, :prenom, '$idClass'");
        $count->execute();
        
        $count->bindParam(':nom', $nom, PDO::PARAM_STR);
        $count->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        
        $sport->bindParam(':football', $football, PDO::PARAM_STR);
        $sport->bindParam(':streetball', $streetball, PDO::PARAM_STR);
        $sport->bindParam(':beachvolley', $beachvolley, PDO::PARAM_STR);
        $sport->bindParam(':frisbee', $frisbee, PDO::PARAM_STR);
        
        try {
            $conn->beginTransaction();
            
            
            
            $conn->commit();
        } catch (Exception $ex) {
            $conn->rollback();
        }
    }
}

?>