<?php
session_start();
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
  <form method="post" action="../back_end/prendreQuestionAjouter.php">
    <div class="titreAdmin">
        <h2>Psychoquizz</h2>
        <h3>Page Admin</h3>
    </div>

    <div class="box1">
        <label> Quelle type de question ?</label>
        <br><br>
        <label class="Choix"> 2 choix </label>
        <input type="radio" href="" id="IDTYPEQUESTION" name="reponse" value="1" class="ON"/>
        <label class="Choix"> 5 choix </label>
        <input type="radio" href="" id="IDTYPEQUESTION" name="reponse" value="2" class="ON"/>
    </div>

    <div class="box2">
        <label for="id_AjoutQuestion">Rédigez la question.</label><br><br>
        <input type="text" placeholder="Ecrivez votre question" class="ajoutQuestion" name="id_AjoutQuestion" id="id_AjoutQuestion" required>
    </div>

    <div class="box3">
        <label for="id_AjoutQuestion">Nombre de points donnés.</label><br><br>
        <label id="option">ID score fermé</label>
        <input type="number" placeholder="0" class="ajoutPoints" name="id_AjoutPointsSISR" id="id_AjoutPointsSISR" required><br><br>
        <label id="option">ID score échelle</label>
        <input type="number" placeholder="0" class="ajoutPoints" name="id_AjoutPointsSLAM" id="id_AjoutPointsSLAM" required>
    </div>

    <div class="box4">
        <button type="submit" name="submit" class="addQuestion">Ajouter</button>
    </div>
  </form>

    <footer>
        © 2023 Copyright: TreizeOrganisé
    </footer>
  </body>
  </html>