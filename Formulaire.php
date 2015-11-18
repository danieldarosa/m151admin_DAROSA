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
        header('Location: ./Lire_donnees.php');
    }
}

$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
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
                            Formulaire d'inscription
                        </legend>
                        
                        <label for="nom">Nom :</label>
                        <input id="nom" type="text" name="nom" id="nom" placeholder="Nom" value="" required autofocus /><br/>

                        <label for="prenom">Prénom :</label>
                        <input id="prenom" type="text" name="prenom" id="prenom" placeholder="Prénom" value="" required/><br/>

                        <label for="pseudo">Pseudonyme :</label>
                        <input id="pseudo" type="text" name="pseudo" id="pseudo" placeholder="Pseudonyme" value="" required/><br/>

                        <label for="email">Email :</label>
                        <input id="email" type="email"  name="email" id="email" placeholder="email@mondomaine.com" value="" required/><br/>

                        <label for="password">Mot de passe :</label>
                        <input id="password" type="password" name="password" id="password" placeholder="" value="" required/><br/>

                        <label for="dateNaissance">Date de naissance :</label>
                        <input id="dateNaissance" type="date" name="date" id="age" placeholder="Votre âge" value=""/><br/>
                        
                        <label for="classe">Classe :</label>
                        <select name="classe" size="1"><?php SelectClasse(); ?></select><br/>

                        <label for="description">Description :</label><br/>
                        <textarea id="description" name="description" cols="50" rows="10"></textarea><br/>
                        
                        <input id="envoyer" type="submit" name="envoyer" id="button" value="Envoyez"   />
                    </fieldset>
                </form>
                <form id="connexion" action="#" method="post" >
                    <fieldset class="log">
                        <legend>
                            Connexion
                        </legend>
                        <table>
                            <tr>
                                <td>
                                    <input type="text" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" required />
                                </td>
                            </tr>
                            <tr>
                                <tr>
                                    <td>
                                        <input type="password" name="password" id="password" placeholder="Mot de passe" required  />
                                    </td>
                                </tr>
                                <tr>
                                    <tr>
                                        <td>
                                            <input type="submit" name="envoyer" id="envoyer" />
                                        </td>
                                    </tr>
                                </tr>
                            </tr>
                        </table>
                    </fieldset>
                </form>
            </div>
        </div>
    </body>
</html>


