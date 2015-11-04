<?php
require_once './FonctionsBD.php';
session_start();
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
                <a href="Logout.php">Logout</a>
            </div>
        </div>
    </body>
</html>