<?php

// Connexion à la base de données quizz en administrateur ROOT

require('../back_end/include/_inc_parametres.php');
require('../back_end/include/_inc_connexion.php');

// Vérification que les données ont été envoyées via la méthode POST

if (isset($_POST['sexe']) && isset($_POST['IDORIGINE']))

    // Récupération des données (sexe et origine), ajout automatique de l'année

    $sexe = $_POST['sexe'];
    $IDORIGINE = $_POST['IDORIGINE'];
    $annee = date("Y");

    // Préparation de la requête d'insertion des données dans la table SQL "sonde"

    $stmt = $cnx->prepare("INSERT INTO sonde (IDORIGINE, SEXE, ANNEE) VALUES (:IDORIGINE, :sexe, :annee)");

    // Exécution de la requête avec les valeurs des paramètres correspondants

    $stmt->execute(array(':IDORIGINE' => $IDORIGINE, ':sexe' => $sexe, ':annee' => $annee));

    // Redirection vers mon questionnaire
    
header("Location: ../front_end/quiz.php");
exit();

// Fermeture de la connexion PDO
$cnx = null;