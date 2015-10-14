<?php
require_once './FonctionsBD.php';


if (isset($_REQUEST['envoyer'])) {
    UpdateUser();
}
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head> 
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title>Modification</title>
        <link href="./cssProjet.css" rel="stylesheet" type="text/css" media="all" charset="UTF-8"></link>
    </head>
    <body>
        <div id="Conteneur">
            <div class="threadMenu">
                <form id="modifier" action="Modifier.php" method="post" >
                    <?php
                    $user = GetUser();
                    foreach ($user as $value) {
                        
                        echo'<input type="hidden" name="idUser" value="'.$value['idUser'].'" />';
                        
                        echo '<label for="nom">Nom :</label>';
                        echo '<input id="nom" type="text" name="nom" id="nom" value="'.$value['nom'].'" required autofocus /><br/>';
                        
                        echo '<label for="prenom">Prénom :</label>';
                        echo '<input id="prenom" type="text" name="prenom" id="prenom" value="'.$value['prenom'].'" required/><br/>';
                        
                        echo '<label for="pseudo">Pseudonyme :</label>';
                        echo '<input id="pseudo" type="text" name="pseudo" id="pseudo" value="'.$value['pseudo'].'" required/><br/>';
                        
                        echo '<label for="email">Email :</label>';
                        echo '<input id="email" type="email"  name="email" id="email" value="'.$value['email'].'" required/><br/>';
                        
                        echo '<label for="password">Nouveau mot de passe :</label>';
                        echo '<input id="password" type="password" name="password" id="password" placeholder="" required/><br/>';
                        
                        echo '<label for="dateNaissance">Date de naissance :</label>';
                        echo '<input id="date" type="date"  name="date" id="date" value="'.$value['dateNaissance'].'" required/><br/>';
                        
                        echo '<label for="description">Description :</label>';
                        echo '<textarea id="description" name="description" placeholder="'.$value['description'].'" cols="50" rows="10"></textarea>';
                        
                        echo '<input id="envoyer" type="submit" name="envoyer" id="button" value="Envoyez"/><br/>';
                    }
                    ?>
                </form>
            </div>
        </div>
    </body>
</html>


