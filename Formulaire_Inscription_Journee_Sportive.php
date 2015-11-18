<?php
require_once './FonctionsBD.php';
session_start();

?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head> 
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title>Formulaire</title>
        <link href="./cssProjet.css" rel="stylesheet" type="text/css" media="all" charset="UTF-8"></link>
    </head>
    <body>
        <div id="Conteneur">
            <div class="threadMenu">
                <form id="inscription" action="Formulaire_insertion.php" method="post" >
                    <fieldset>
                        <legend>
                            Formulaire d'inscription à la journée sportive
                        </legend>
                        
                        <label for="nom">Nom :</label>
                        <input id="nom" type="text" name="nom" id="nom" placeholder="Nom" value="" required autofocus /><br/>

                        <label for="prenom">Prénom :</label>
                        <input id="prenom" type="text" name="prenom" id="prenom" placeholder="Prénom" value="" required/><br/>
                        
                        <input id="envoyer" type="submit" name="envoyer" id="button" value="Envoyez"   />
                    </fieldset>
                </form>
            </div>
        </div>
    </body>
</html>