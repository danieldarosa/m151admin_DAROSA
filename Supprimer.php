<?php
require_once 'FonctionsBD.php';

if (isset($_REQUEST['confirmer'])) {
    DeleteUser();
}
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head> 
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <title>Suppression</title>
        <link href="./cssProjet.css" rel="stylesheet" type="text/css" media="all" charset="UTF-8"></link>
    </head>
    <body>
        <div id="Conteneur">
            <div class="threadMenu">
                <form id="supprimer" action="Supprimer.php" method="get" >
                    <?php
                        $id = $_GET['id'];
                        echo'<input type="hidden" name="id" value="' . $id . '" />';
                        echo 'Voulez-vous supprimer cet utilisateur ?';
                        echo '<input id="confirmer" type="submit" name="confirmer" value="Confirmer"/><br/>';
                    ?>               
                </form>
            </div>
        </div>
    </body>
</html>