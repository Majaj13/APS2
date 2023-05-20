<?php
session_start();

if(!isset($_SESSION['id_admin']))
{
  header('Location: ../front_end/login.html');
  exit();
}

?>

<!DOCTYPE html>
<html lang='fr'>

<!--Titre de la page, description, utilisation d'unicode, importation du css et des images-->

  <head>
    <title>Questions | administrateur</title>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="description" content="Page de gestion des questions">
     <link rel="stylesheet" type="text/css" media="screen" href="../assets/css/main.css">
     <link rel="stylesheet" type="image/png" href="../assets/images/Logo-FLD.png">
     <link rel="icon" type="image/x-icon" href="../assets/images/Logo-FLD.png">
  </head>

  <!-- HEADER -->
  
  <header>
    <img src="../assets/images/Logo-FLD.png" alt="fld">
  </header>

  <body>

  <div class="titreAdmin">
        <h2>Psychoquizz</h2>
        <h3>Page Admin</h3>
    </div>

    <a href="ajouterQuestion.php" class="btnAjoutQuestion">Ajouter une question</a>
    <a href="../front_end/accueil.php" class="btnRetourAccueil">Accueil</a>

  <?php

  include('../back_end/afficherQuestions.php');

  ?>

  
<footer>
        © 2023 Copyright: TreizeOrganisé
    </footer>
  </body>
  </html>
