<?php
session_start();

require('../back_end/include/_inc_parametres.php');   //Connexion base de données
require('../back_end/include/_inc_connexion.php');

try 
{
    $cnx->beginTransaction();

    if (isset($_POST['sexe']) && isset($_POST['IDORIGINE'])) 
    {
        $sexe = $_POST['sexe'];
        $IDORIGINE = $_POST['IDORIGINE'];
        $annee = date("Y");

        $stmt = $cnx->prepare("INSERT INTO sonde (IDORIGINE, SEXE, ANNEE) 
                               VALUES (:IDORIGINE, :sexe, :annee)");

        $stmt->execute(array(':IDORIGINE' => $IDORIGINE, ':sexe' => $sexe, ':annee' => $annee));

        $id_sonde = $cnx->lastInsertId();

        $_SESSION['IDSONDE'] = $id_sonde;
    } 

    // Validation de la transaction

    $cnx->commit();

    header("Location: ../front_end/quiz.php");
    exit();
} 
catch (Exception $e)   //en cas d'erreur
{
    $cnx->rollback();
    echo "<br>Tout ne s'est pas bien passé, voir les erreurs ci-dessous :</br>";
    echo "Erreur : " . $e->getMessage(). " N° : ".$e->getCode();                          //Arrêt de l'éxécution si il y a du code après
    exit();
}

// Fermeture de la connexion PDO

$cnx = null;

var_dump($_SESSION);
?>