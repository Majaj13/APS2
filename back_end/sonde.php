<?php

require('../back_end/include/_inc_parametres.php');   //Connexion base de données
require('../back_end/include/_inc_connexion.php');

try 
{
    $cnx->beginTransaction();

    // Vérification que les données ont été envoyées via la méthode POST
    if (isset($_POST['sexe']) && isset($_POST['IDORIGINE'])) 
    {
        // Récupération des données (sexe et origine), ajout automatique de l'année
        $sexe = $_POST['sexe'];
        $IDORIGINE = $_POST['IDORIGINE'];
        $annee = date("Y");

        // Préparation de la requête d'insertion des données dans la table SQL "sonde"
        $stmt = $cnx->prepare("INSERT INTO sonde (IDORIGINE, SEXE, ANNEE) VALUES (:IDORIGINE, :sexe, :annee)");


        // Exécution de la requête avec les valeurs des paramètres correspondants
        $stmt->execute(array(':IDORIGINE' => $IDORIGINE, ':sexe' => $sexe, ':annee' => $annee));
    } 

    // Validation de la transaction
    $cnx->commit();

    // Redirection vers mon questionnaire
    header("Location: ../front_end/quiz.php");
    exit();
} 
catch (Exception $e) //en cas d'erreur
{
    // Annulation de la transaction
    $cnx->rollback();
    echo "<br>Tout ne s'est pas bien passé, voir les erreurs ci-dessous :</br>";
    echo "Erreur : " . $e->getMessage(). " N° : ".$e->getCode();   //Arrêt de l'éxécution si il y a du code après
    exit();
}

// Fermeture de la connexion PDO
$cnx = null;

?>