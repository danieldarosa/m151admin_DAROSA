
<!DOCTYPE HTML>
<?php ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head> 
        <meta http-equiv="content-type" content="test/html; charset=UTF-8" />
        <title></title>
        <link href="./cssProjet.css" rel="stylesheet" type="text/css" media="all" charset="UTF-8"></link>
    </head>
    <body>
        <div id="Conteneur">
            <div class="threadMenu">
                <form id="inscription" action="Formulaire_insertion.php" method="post" >
                    <fieldset>
                        <legend>
                            Formulaire d'inscription
                        </legend>
                        
                        <label for="Nom">Nom :</label>
                        <input id="nom" type="text" name="nom" id="nom" placeholder="Nom" required autofocus /><br/>

                        <label for="Prénom">Prénom :</label>
                        <input id="prenom" type="text" name="prenom" id="prenom" placeholder="Prénom" required autofocus /><br/>

                        <label for="Pseudo">Pseudonyme :</label>
                        <input id="pseudo" type="text" name="pseudo" id="pseudo" placeholder="Pseudonyme" required autofocus /><br/>

                        <label for="Email">Email :</label>
                        <input id="email" type="email"  name="email" id="email" placeholder="email@mondomaine.com" required autofocus/><br/>

                        <label for="Password">Mot de passe :</label>
                        <input id="password" type="password" name="password" id="password" placeholder="" required autofocus/><br/>

                        <label for="DateNaissance">Date de naissance :</label>
                        <input id="dateNaissance" type="date" name="date" id="age" placeholder="Votre âge"/><br/>

                        <label for="Description">Description :</label>
                        <textarea id="description" name="description" cols="50" rows="10"><?php if (isset($_POST['description'])) echo htmlentities(trim($_POST['description'])); ?></textarea><br/>

                        <input id="envoyer" type="submit" id="button" value="Envoyez"   />
                    </fieldset>
                </form>
            </div>
        </div>
    </body>
</html>


