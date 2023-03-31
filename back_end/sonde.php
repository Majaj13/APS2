<?php 
    require('include/_inc_parametres.php'); 
    require('include/_inc_connexion.php');
    var_dump($_POST);

    if (isset($_POST['sexe']) && isset($_POST['IDORIGINE'])) {
        $sexe = $_POST['sexe'];
        $IDORIGINE = $_POST['IDORIGINE'];
        $annee = date("Y");

        $stmt = $cnx->prepare("INSERT INTO sonde (IDORIGINE, SEXE, ANNEE) VALUES (:IDORIGINE, :sexe, :annee)");
        $stmt->bindParam(':IDORIGINE', $IDORIGINE);
        $stmt->bindParam(':sexe', $sexe);
        $stmt->bindParam(':annee', $annee);
        $stmt->execute();
    }
    header("Location: ../front_end/quiz.php");
    exit();

    $cnx = null;  

?>