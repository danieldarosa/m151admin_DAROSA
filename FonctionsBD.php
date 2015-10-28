<?php

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

function InsertUser() {
    if (!empty($_REQUEST['nom'])) {

        $nom = $_REQUEST['nom'];
        $prenom = $_REQUEST['prenom'];
        $pseudo = $_REQUEST['pseudo'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $Hashpassword = sha1(md5(sha1($password . $email)));
        $date = $_REQUEST['date'];
        $description = $_REQUEST['description'];

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

function GetData() {

    $data = SelectData();
    foreach ($data as $value) {

        echo ' Nom : ' . $value['nom'] . ' <br/> ';
        echo ' Prénom : ' . $value['prenom'] . ' <br/> ';
        echo ' Pseudo : ' . $value['pseudo'] . ' <br/> ';
        echo ' Email : ' . $value['email'] . ' <br/> ';
        echo ' Date de naisssance : ' . $value['dateNaissance'] . ' <br/> ';
        echo ' Description : ' . $value['description'] . ' <br/> ';
        echo '<a href="Modifier.php?id=' . $value['idUser'] . '">Modifier les données</a> <br/>';
        echo '<a href="Supprimer.php?id=' . $value['idUser'] . '">Supprimer l\'utilisateur</a> <br/>';
        echo '<br/>';
    }
}

function GetUser() {
    $id = $_GET['id'];
    $data = GetConnection()->prepare("SELECT * FROM user WHERE idUser = $id");
    $data->execute();
    $user = $data->fetchAll();
    return $user;
}

function UpdateUser() {
    
    $id = $_REQUEST['idUser'];

    if (!empty($_REQUEST['nom'])) {
        
        $nom = $_REQUEST['nom'];
        $prenom = $_REQUEST['prenom'];
        $pseudo = $_REQUEST['pseudo'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $Hashpassword = sha1(md5(sha1($password . $email)));
        $date = $_REQUEST['date'];
        $description = $_REQUEST['description'];
        
        $count = GetConnection()->prepare("UPDATE user SET nom = :nom, prenom = :prenom, pseudo = :pseudo, email = :email, password = :password, dateNaissance = :date, description = :description WHERE idUser = '$id'");

        $count->bindParam(':nom', $nom, PDO::PARAM_STR);
        $count->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $count->bindParam(':pseudo', $prenom, PDO::PARAM_STR);
        $count->bindParam(':email', $email, PDO::PARAM_STR);
        $count->bindParam(':password', $Hashpassword, PDO::PARAM_STR);
        $count->bindParam(':date', $date, PDO::PARAM_INT);
        $count->bindParam(':description', $description, PDO::PARAM_STR);

        $count->execute();
        
        header('Location: ./Lire_donnees.php');
    } else {
        echo 'Les champs remplis ne sont pas corrects...';
    }
}

function DeleteUser() {
    $id = $_REQUEST['id'];
    $delete = GetConnection()->prepare("DELETE FROM user WHERE idUser = '$id'");
    $delete->execute();
    header('Location: ./Lire_donnees.php');
}

?>