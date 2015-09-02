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

    $dbh = GetConnection();

    if (!empty($_POST['nom'])) {

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $pseudo = $_POST['pseudo'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $date = $_POST['date'];
        $description = $_POST['description'];

        //On prépare la requête d'ajout des données dans la base avec les paramètres choisis
        //INSERT INTO `user`(`nom`, `prénom`, `pseudo`, `email`, `password`, `dateNaissance`, `description`) VALUES (,'test','test','test','test','test','1989-10-10','test')
        $count = $dbh->prepare("INSERT INTO user(nom,prenom,pseudo,email,password,dateNaissance,description) VALUES(:nom, :prenom, :pseudo, :email, :password, :date, :description)");

        //On met en paramètre ce qu'on veut ajouter dans la base
        $count->bindParam(':nom', $nom, PDO::PARAM_STR);
        $count->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $count->bindParam(':pseudo', $prenom, PDO::PARAM_STR);
        $count->bindParam(':email', $email, PDO::PARAM_STR);
        $count->bindParam(':password', $password, PDO::PARAM_STR);
        $count->bindParam(':date', $date, PDO::PARAM_INT);
        $count->bindParam(':description', $description, PDO::PARAM_STR);

        //On execute la requête
        $count->execute();
    } else {
        //Si non, on affiche un message d'erreur
        echo 'Les champs remplis ne sont pas corrects...';
    }
}
var_dump($_POST);
if(isset($_POST['envoyer']))
{
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
                <p></p>
            </div>
    </body>
</html>

