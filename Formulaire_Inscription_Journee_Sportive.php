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
                <form id="inscription" action="Formulaire_JS_Reussi.php" method="post" >
                    <fieldset>
                        <legend>
                            Formulaire d'inscription à la journée sportive
                        </legend>
                        
                        <label for="nom">Nom :</label>
                        <input id="nom" type="text" name="nom" placeholder="Nom" value="" required autofocus /><br/>

                        <label for="prenom">Prénom :</label>
                        <input id="prenom" type="text" name="prenom" placeholder="Prénom" value="" required/><br/>
                        
                        <h1>Choix des activités :</h1>
                        
                        <label for="football">Football :</label>
                        <input id="football" type="text" name="football" placeholder="Votre choix de préference" required autofocus /><br/>

                        <label for="streetball">Streetball :</label>
                        <input id="streetball" type="text" name="streetball" placeholder="Votre choix de préference" value="" required/><br/>
                        
                        <label for="beachvolley">Beach volley :</label>
                        <input id="beachvolley" type="text" name="beachvolley" placeholder="Votre choix de préference" value="" required autofocus /><br/>

                        <label for="frisbee">Frisbee :</label>
                        <input id="frisbee" type="text" name="frisbee" placeholder="Votre choix de préference" value="" required/><br/>
                        
                        <input id="envoyer" type="submit" name="envoyer" value="Envoyez"   />
                    </fieldset>
                </form>
            </div>
        </div>
    </body>
</html>