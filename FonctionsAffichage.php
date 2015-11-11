<?php

require_once './FonctionsBD.php';

function GetData() {
    $data = SelectData();
    if ($_SESSION['user_id'] != null) {
        foreach ($data as $value) {

            echo ' Nom : ' . $value['nom'] . ' <br/> ';
            echo ' Prénom : ' . $value['prenom'] . ' <br/> ';
            echo ' Pseudo : ' . $value['pseudo'] . ' <br/> ';
            echo ' Email : ' . $value['email'] . ' <br/> ';
            echo ' Date de naisssance : ' . $value['dateNaissance'] . ' <br/> ';
            echo ' Description : ' . $value['description'] . ' <br/> ';
            if ($value['idUser'] == $_SESSION['user_id'] && $_SESSION['admin'] == 0) {
                AllowModifyUser();
            }
            if ($_SESSION['admin'] == 1) {
                echo '<a href="Supprimer.php?id=' . $value['idUser'] . '">Supprimer l\'utilisateur</a> <br/>';
                echo '<a href="Modifier.php?id=' . $value['idUser'] . '">Modifier les données</a> <br/>';
            }
            echo '<br/>';
        }
    } else {
        echo 'le login est faux';
    }
}

function AllowModifyUser() {
    echo '<a href="Modifier.php?id=' . $_SESSION['user_id'] . '">Modifier les données</a> <br/>';
}

?>