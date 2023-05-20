<?php
session_start();
?>

<!DOCTYPE html>
<html>

<!--Titre de la page, description, utilisation d'unicode, importation du css et des images-->

  <head>
    <title>Accueil | administrateur</title>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="description" content="Page d'Accueil pour les administrateurs du PsychoQuizz">
     <link rel="stylesheet" type="text/css" media="screen" href="../assets/css/main.css">
     <link rel="stylesheet" type="image/png" href="../assets/images/Logo-FLD.png">
     <link rel="icon" type="image/x-icon" href="../assets/images/Logo-FLD.png">
  </head>
  <body>

    <!-- HEADER -->

    <header>
        <img src="../assets/images/Logo-FLD.png" alt="fld">

        <?php

        if(isset($_SESSION['id_admin']))  //Affichage d'un bouton de deconnexion si PHP détecte qu'une personne est connectée
        {
          echo '<a href="../back_end/logout.php" class="btnDeconnexion">Deconnexion</a>';  //Redirection vers le fichier logout.php qui déconnecte l'administrateur
        }
        else
        {
          header('Location: ../front_end/login.html');
          exit();
        }
        ?>

    </header>

    <!-- BOUTONS -->

      <div class="btnQuestions">
        <a href="gestionQuestions.php">Questions</a>  
    </div>
    <div class="btnStatistiques">
        <a href="gestionStatistiques.php">Statistiques</a>  
    </div>

    <!-- FOOTER-->

    <footer>
        © 2023 Copyright: TreizeOrganisé
    </footer>
  </body>
</html>