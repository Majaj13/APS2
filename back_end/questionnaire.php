<?php

require('../back_end/include/_inc_parametres.php');
require('../back_end/include/_inc_connexion.php');

try
{
    $question_actuelle = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    $cnx->beginTransaction();
    
    $query = "SELECT MAX(IDQUESTION) AS max_id, question.IDQUESTION, question.LIBELLE, question.IDTYPEQUESTION 
              FROM question 
              WHERE IDQUESTION > ?  
              ORDER BY IDQUESTION LIMIT 1";

    $stmt = $cnx->prepare($query);
    $stmt->bindValue(1, $question_actuelle, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $id_question = $row["IDQUESTION"];
    $libelle_question = $row["LIBELLE"];
    $max_id = $row["max_id"];
    $idtype = $row["IDTYPEQUESTION"];

    // Choisir le bon type de question Type1/Type2

    if ($idtype == 1)
    {
        $texte = "<label>" . $id_question . " - " . $libelle_question . " ? </label><br>";
        $texte .= '<input type="radio" href="?id=' . $id_question .  '" id="REP" name="REP" value="1" class="ON"/>';
        $texte .= '<label class="Gauche"> oui </label>';
        $texte .= "<br>";
        $texte .= '<input type="radio" href="?id=' . $id_question .  '" id="REP" name="REP" value="2" class="ON"/>';
        $texte .= '<label class="Gauche"> non </label>';
    }
    elseif ($idtype == 2) 
    {
        $texte = "<label>" . $id_question . " - " . $libelle_question . " ? </label>";
        $texte .= '<form>';
        $texte .= '<label class="Droite"> Pas du tout</label><input type="radio" name="gradue" value="duTout" class="gradue">';
        $texte .= '<input type="radio" name="gradue" value="peu" class="gradue">';
        $texte .= '<input type="radio" name="gradue" value="moyen" class="gradue">';
        $texte .= '<input type="radio" name="gradue" value="beaucoup-" class="gradue">';
        $texte .= '<input type="radio" name="gradue" value="beaucoup" class="gradue"><label class="Droite"> Énormément</label>';
        $texte .= '</form>';
    }
    // Choisir le bon type de bouton Suivant/Terminé

   if ($id_question != $max_id) 
   {
        $texte .= '<form action="quizz.php?' . http_build_query(array("id" => $id_question)) . '" method="post">';
        $texte .= '<div>';
        $texte .= '<button type="submit" name="submit" class="Suivant">Suivant</button>';
        $texte .= '</div>';
        $texte .= '</form>';
   } 
   else 
   {
        $texte .= '<form action="resultat.php? method="post">';
        $texte .= '<div>';
        $texte .= '<button type="submit" name="submit" class="Suivant">Terminé</button>';
        $texte .= '</div>';
        $texte .= '</form>';
   }


   $cnx->commit();
}
catch (Exception $e)   //en cas d'erreur
{
    $cnx->rollback();
    echo "<br>Tout ne s'est pas bien passé, voir les erreurs ci-dessous :</br>";
    echo "Erreur : " . $e->getMessage(). " N° : ".$e->getCode();         //Arrêt de l'éxécution si il y a du code après
    exit();
}

$cnx = null;

?>