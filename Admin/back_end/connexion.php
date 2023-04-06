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

    // Si le mot de passe répond à isValidMDP alors on continue sinon message d'erreur

    if (!isValidMDP($mdp_admin)) {
      echo "Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre, un caractère spécial et au moins 8 caractères !";
      exit();
    }

    // Requête SQL afin de vérifier les données de connexion

    $query = "SELECT * FROM admins WHERE id_admin=:id_admin";
    $stmt = $cnx->prepare($query);
    $stmt->bindValue(':id_admin', $id_admin, PDO::PARAM_STR);    //bindParam pour éviter les injections SQL
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérification du résultat

    if ($result && password_verify($mdp_admin, $result['mdp_admin'])) {  // Vérification du hash

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