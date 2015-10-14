<?php
require_once './FonctionsBD.php';

function SelectData() {
    $select = GetConnection()->prepare("SELECT * FROM user");
    $select->execute();
    $table = $select->fetchAll(PDO::FETCH_ASSOC);
    return $table;
}

function GetData() {

    $data = SelectData();
    foreach ($data as $value) {

        echo ' Nom : ' . $value['nom'] . ' <br/> ';
        echo ' Prénom : ' . $value['prenom'] . ' <br/> ';
        echo ' Pseudo : ' . $value['pseudo'] . ' <br/> ';
        echo ' Email : ' . $value['email'] . ' <br/> ';
        echo ' Date de naisssance : ' . $value['dateNaissance'] . ' <br/> ';
        echo ' Description : ' . $value['description'] . ' <br/> ';
        echo '<a href="Modifier.php?id=' . $value['idUser'] . '">Modifier les données</a> <br/>';
        echo '<a href="Supprimer.php?id=' . $value['idUser'] . '">Supprimer l\'utilisateur</a> <br/>';
        echo '<br/>';
    }
}
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head> 
        <meta http-equiv="content-type" content="test/html; charset=UTF-8" />
        <title>Lecture des données</title>
        <link href="./cssProjet.css" rel="stylesheet" type="text/css" media="all" charset="UTF-8"></link>
    </head>

    <body>
        <div id="Conteneur">
            <div class="threadMenu">
                <form id="user" action="Modifier.php" method="post">
                    <?php
                    GetData();
                    ?>
                </form>
            </div>
        </div>
    </body>
</html>