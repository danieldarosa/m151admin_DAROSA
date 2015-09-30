<?php
require_once 'Connexion.php';

function GetUser() {
    $id = $_GET['id'];
    $data = GetConnection()->prepare("SELECT idUser FROM user WHERE idUser = $id");
    $data->execute();
    $line = $data->fetch(PDO::FETCH_ASSOC);
    return $line;
}

function DeleteUser() {
    $id = $_REQUEST['idUser'];
    $delete = GetConnection()->prepare("DELETE FROM user WHERE idUser = '$id'");
    $delete->execute();
    header('Location: ./Lire_donnees.php');
}

if (isset($_REQUEST['confrimer'])) {
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
                <form id="supprimer" action="Supprimer.php" method="post" >
                    <?php
                        $user = GetUser();
                        echo'<input type="hidden" name="idUser" value="' . $user['idUser'] . '" />';
                        echo 'Voulez-vous supprimer cet utilisateur ?';
                        echo '<input id="confirmer" type="submit" name="confirmer" id="button" value="Confirmer"/><br/>';
                    ?>
                </form>
            </div>
        </div>
    </body>
</html>