<?php
require_once 'FonctionsBD.php';

if (isset($_REQUEST['envoyer'])) {
    $row = Login($_REQUEST['email'], $_REQUEST['password']);
    
    var_dump($row);
    if ($row != null) {
        session_start();
        $_SESSION['user_id'] = $row['idUser'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['admin'] = $row['admin'];
    }
    
    header('Location: ./Lire_donnees.php');
    exit();
}
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head> 
        <meta http-equiv="content-type" content="test/html; charset=UTF-8" />
        <title>Formulaire</title>
        <link href="./cssProjet.css" rel="stylesheet" type="text/css" media="all" charset="UTF-8"></link>
    </head>
    <body>
        <div id="Conteneur">
            <div class="threadMenu">
                <p>Vous n'avez pas rentré les bons champs... veuillez réessayer</p>
            </div>
        </div>
    </body>
</html>