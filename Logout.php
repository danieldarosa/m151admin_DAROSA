<?php
session_unset();
session_destroy();

header('Location: ./Formulaire.php');
exit();
?>


