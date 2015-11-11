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
    if (!empty($_REQUEST['nom'])) { //TODO attention, pas de test avec $REQUEST ici, la fonction doit être indépendante
        $Hashpassword = sha1(md5(sha1($password . $email)));

        //On prépare la requête d'ajout des données dans la base avec les paramètres choisis
        //INSERT INTO `user`(`nom`, `prénom`, `pseudo`, `email`, `password`, `dateNaissance`, `description`) VALUES (,'test','test','test','test','test','1989-10-10','test')
        $count = GetConnection()->prepare("INSERT INTO user(nom,prenom,pseudo,email,password,dateNaissance,description) VALUES(:nom, :prenom, :pseudo, :email, :password, :date, :description)");

        //On met en paramètre ce qu'on veut ajouter dans la base
        $count->bindParam(':nom', $nom, PDO::PARAM_STR);
        $count->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $count->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $count->bindParam(':email', $email, PDO::PARAM_STR);
        $count->bindParam(':password', $Hashpassword, PDO::PARAM_STR);
        $count->bindParam(':date', $date, PDO::PARAM_INT);
        $count->bindParam(':description', $description, PDO::PARAM_STR);

        //On execute la requête
        $count->execute();
    } else {
        //Si non, on affiche un message d'erreur
        echo 'Les champs remplis ne sont pas corrects...';
    }
}

function SelectData() {
    $select = GetConnection()->prepare("SELECT * FROM user");
    $select->execute();
    $table = $select->fetchAll(PDO::FETCH_ASSOC);
    return $table;
}
//TODO séparer les fonctions d'affichage des fonctions BD dans deux fichiers différents
function GetData() {

    $data = SelectData();
    foreach ($data as $value) {

        echo ' Nom : ' . $value['nom'] . ' <br/> ';
        echo ' Prénom : ' . $value['prenom'] . ' <br/> ';
        echo ' Pseudo : ' . $value['pseudo'] . ' <br/> ';
        echo ' Email : ' . $value['email'] . ' <br/> ';
        echo ' Date de naisssance : ' . $value['dateNaissance'] . ' <br/> ';
        echo ' Description : ' . $value['description'] . ' <br/> ';
        if($value['idUser'] == $_SESSION['user_id']) {
            AllowModifyUser();
        }
        
        if($_SESSION['admin'] == 1) {
            AllowModifyUser();
            IsAdmin();
        }
        echo '<br/>';
    }
}
//TODO attention pas d'accès au $GET ici, il faut passer le userId en paramètre à la fonction de façon à ce qu'elle soit indépendante
function GetUser() {
    $id = $_GET['id'];
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
        $count->bindParam(':pseudo', $prenom, PDO::PARAM_STR);
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
//TODO est-ce que ces deux fonctions sont vraiment dans fonctionsBD ou plutôt dans la partie affichage?
function AllowModifyUser() {
        echo '<a href="Modifier.php?id=' . $_SESSION['user_id'] . '">Modifier les données</a> <br/>';  
}

function IsAdmin() {
        echo '<a href="Supprimer.php?id=' . $_SESSION['user_id'] . '">Supprimer l\'utilisateur</a> <br/>';
}

?>