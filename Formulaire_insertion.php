<?php
DEFINE("HOST", "127.0.0.1");
DEFINE("DBNAME", "m151_formulaire");
DEFINE("USERNAME", "root");
DEFINE("PASSWORD", "");
function GetConnection()
{
	static $dbh = null;
	try {
		if($dbh == null){
			$dbh = new PDO('mysql:host='.HOST.';dbname='.DBNAME,USERNAME,PASSWORD);
			}
	} catch (PDOException $e) {
		die('Erreur : ' .$e->getMessage());
	}
	return $dbh;
}

$dbh = GetConnection();

/*if (!empty($_POST['nom']) && (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) !== false)) {
	
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $date = $_POST['date'];
    $description = $_POST['description'];

    //On prépare la requête d'ajout des données dans la base avec les paramètres choisis
    $count = $dbh->prepare("INSERT INTO user VALUES('', :nom, :prenom, :pseudo, :email, :password, :date, :description)");

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
    
    header('Location: ./Formulaire.php');
} else {
    //Si non, on affiche un message d'erreur
    echo 'Les champs remplis ne sont pas corrects...';
}*/
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
            <div id="titre">
                <img src="Images/Titre.png" />
            </div>
            <div class="menu">
                <p>Bravo ! Vous faites désormais membre de ce site! Cliquez sur le lien du dessous pour retourner à la page d'acceuil pour pouvoir vous connecter !</p>
                <a href="./Index.php">Retour à la page d'acceuil</a>
            </div>
            <div class="copyright">
                <img src="Images/Copyright.png" />
            </div>
        </div>
    </body>
</html>

