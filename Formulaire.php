<?php ?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head> 
        <meta http-equiv="content-type" content="test/html; charset=UTF-8" />
        <title></title>
        <link href="./cssProjet.css" rel="stylesheet" type="text/css" media="all" charset="UTF-8"></link>
    </head>
    <body>
        <div id="Conteneur">
            <div class="threadMenu">
                <form id="inscription" action="Inscription_Reussi.php" method="post" >
                    <fieldset>
                        <legend>
                            Formulaire d'inscription
                        </legend>
                            <p>Nom :</p>
                            
                            <p><input type="text" name="nom" id="nom" placeholder="Nom" required autofocus /></p>

                            <p>Prénom :</p>

                            <p><input type="text" name="prenom" id="prenom" placeholder="Prénom" required autofocus /></p>

                            <p>Pseudonyme :</p>

                            <p><input type="text" name="pseudo" id="pseudo" placeholder="Pseudonyme" required autofocus /></p>

                            <p>Email :</p>

                            <p><input type="email"  name="email" id="email" placeholder="email@mondomaine.com" required autofocus/></p>

                            <p>Mot de passe :</p>

                            <p><input type="password" name="password" id="password" placeholder="" required autofocus/></p>

                            <p>Date de naissance :</p>

                            <p><input type="date" name="age" id="age" placeholder="Votre âge"/></p>

                            <p>Description :</p>

                            <p><textarea name="message" cols="50" rows="10"></textarea></p>

                            <p><input type="submit" id="button" value="Envoyez"   /></p>
                    </fieldset>
                </form>
            </div>
        </div>
    </body>
</html>


