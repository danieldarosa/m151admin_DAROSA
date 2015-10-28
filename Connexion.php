<?php
require_once 'FonctionsBD.php';

if (isset($_REQUEST['envoyer'])) {
    Login();
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