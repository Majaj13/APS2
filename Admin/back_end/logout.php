<?php
session_start();

// Détruit toutes les variables de session

session_unset();

// Détruit la session

session_destroy();

// Redirige l'admin vers la page de connexion

header('Location: ../front_end/login.html');
exit();
?>