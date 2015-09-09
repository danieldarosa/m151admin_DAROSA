<?php
DEFINE("HOST", "127.0.0.1");
DEFINE("DBNAME", "m151_formulaire");
DEFINE("USERNAME", "root");
DEFINE("PASSWORD", "");

function GetConnection() {
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
        $count->bindParam(':pseudo', $prenom, PDO::PARAM_STR);
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

if (isset($_REQUEST['envoyer'])) {
    InsertUser();
}
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head> 
        <meta http-equiv="content-type" content="test/html; charset=UTF-8" />
        <title>Figurines Animés</title>
        <link href="./cssProjet.css" rel="stylesheet" type="text/css" media="all" charset="UTF-8"></link>
    </head>

    <body>
        <div id="Conteneur">
            <div class="threadMenu">
                <p>Insertion Réussi</p>
            </div>
    </body>
</html>

