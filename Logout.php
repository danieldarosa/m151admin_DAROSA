<?php
    session_start();
    session_unset();
    session_destroy();

header('Location: ./Formulaire.php');
exit();
?>


