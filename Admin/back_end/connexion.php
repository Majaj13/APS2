<?php

// Connexion à la BDD

require('../back_end/include/_inc_parametres.php');
require('../back_end/include/_inc_connexion.php');

// Expression régulière pour vérifier le mot de passe

function isValidMDP($mdp)
{
  return preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[;§!@?]).{8,}$/', $mdp); 
}

try {
  if (isset($_POST['submit'])) {

    // Récupération des données du formulaire de connexion

    $id_admin = $_POST['id_admin'];
    $mdp_admin = $_POST['mdp_admin'];

    // Si le mot de passe réponds à isValidMDP alors on continue sinon message d'erreur

    if (!isValidMDP($mdp_admin)) {
      echo "Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre, un caractère spécial et être d'au moins 8 caractères.";
      exit();
    }

    // Requête SQL afin de vérifier les données de connexion

    $query = "SELECT * FROM admins WHERE id_admin=:id_admin AND mdp_admin=:mdp_admin";
    $stmt = $cnx->prepare($query);
    $stmt->bindParam(':id_admin', $id_admin);     //bindParam pour éviter les injections SQL
    $stmt->bindParam(':mdp_admin', $mdp_admin);
    $stmt->execute();
    $result = $stmt->fetchAll();

    // Vérification du résultat

    if (count($result) == 1) {

      // Connexion réussie et redirection vers la page suivante

      session_start();
      $_SESSION['id_admin'] = $id_admin;
      header("Location: ../front_end/accueil.html");
      exit();
    } else {

      // Connexion échouée
      
      echo "L'identifiant ou le mot de passe est incorrect.";
    }
  }
} catch(PDOException $e) {
  echo "La connexion a échoué: " . $e->getMessage();
}
?>