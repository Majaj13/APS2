<?php

// Connexion à la BDD

require('../back_end/include/_inc_parametres.php');
require('../back_end/include/_inc_connexion.php');

if (isset($_GET['id'])) 
{
  $id_question = $_GET['id'];
  
  $sql = "DELETE 
          FROM question 
          WHERE IDQUESTION = :id_question";  //Supprimer la question selectionné (ligne entière libelle, idtypequestion..;)
  $stmt = $cnx->prepare($sql);
  $stmt->bindValue(':id_question', $id_question, PDO::PARAM_INT);
  if ($stmt->execute()) 
  {
    $sql = "SET @count = 0";      //variable mysql afin de numéroter les lignes
    $stmt = $cnx->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE question 
            SET question.IDQUESTION = @count := @count + 1";    //augmenter de 1 à chaque idquestion :=
    $stmt = $cnx->prepare($sql);
    $stmt->execute();

    $sql = "ALTER TABLE question AUTO_INCREMENT = 1";   //Recommencer à 1 après avoir réordonnés les questions
    $stmt = $cnx->prepare($sql);
    $stmt->execute();

    header("Location: ../front_end/gestionQuestions.php");  //Rdirection page de gestion pour une modification rapide et pratique
  } 
  else 
  {
    echo "Une erreur s'est produite lors de la suppression de la question : " . $cnx->error;
  }
  
  exit;
}

?>