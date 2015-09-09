<?php
require_once 'Connexion.php';

function LastID() {
    $id = GetConnection()->prepare("SELECT idUser FROM user ORDER BY idUser DESC");
    $id->execute();
    return $id;
}

function SelectData() {
    $select = GetConnection()->prepare("SELECT * FROM user");
    $select->execute();
    $table = $select->fetch(PDO::FETCH_ASSOC);
    return $table;
}

function GetData() {

    $data = SelectData();
    while ($data['idUser'] != LastID()) {

        echo ' Nom : ' . $data['nom'] . ' <br/> ';
        echo ' Prénom : ' . $data['prenom'] . ' <br/> ';
        echo ' Pseudo : ' . $data['pseudo'] . ' <br/> ';
        echo ' Email : ' . $data['email'] . ' <br/> ';
        echo ' Date de naisssance : ' . $data['dateNaissance'] . ' <br/> ';
        echo ' Description : ' . $data['description'] . ' <br/> ';
        echo '<br/>';
        $data['idUser']++;
    }
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
                <?php
                GetData();
                ?>
            </div>
        </div>
    </body>
</html>