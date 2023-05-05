<?php

// Connexion à la base de données quizz en administrateur ROOT

require('../back_end/include/_inc_parametres.php');
require('../back_end/include/_inc_connexion.php');

// Vérification que les données ont été envoyées via la méthode POST

if (isset($_POST['id_AjoutQuestion']) && isset($_POST['reponse']) && isset($_POST['id_AjoutPointsSISR']) && isset($_POST['id_AjoutPointsSLAM'])) {

    // Récupération des données (sexe et origine), ajout automatique de l'année

    $LIBELLE = $_POST['id_AjoutQuestion'];
    $IDTYPEQUESTION = $_POST['reponse'];
    $IDSCOREFERMEE = $_POST['id_AjoutPointsSISR'];
    $IDSCORECH = $_POST['id_AjoutPointsSLAM'];
    $ENJEU = "entamereflexion";

    // Préparation de la requête d'insertion des données dans la table SQL "question"

    $stmt = $cnx->prepare("INSERT INTO question (LIBELLE, IDTYPEQUESTION, IDSCOREFERMEE, IDSCORECH, ENJEU) VALUES (:LIBELLE, :IDTYPEQUESTION, :IDSCOREFERMEE, :IDSCORECH, :ENJEU)");

    // Exécution de la requête avec les valeurs des paramètres correspondants

    $stmt->execute(array(':LIBELLE' => $LIBELLE, ':IDTYPEQUESTION' => $IDTYPEQUESTION, ':IDSCOREFERMEE' => $IDSCOREFERMEE, ':IDSCORECH' => $IDSCORECH, ':ENJEU' => $ENJEU));
}

// Fermeture de la connexion PDO

$cnx = null;

// Redirection vers mon la gestion de question

header("Location: ../front_end/gestionQuestions.php");
exit();
?> 