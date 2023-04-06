<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>APS2</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" type="image/png" href="../assets/images/Logo-FLD.png" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../assets/css/main.css" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="Maël Merrer">
        <meta name="description" content="Page d'acceuil psychoquiz">
        <meta name="keywords" content="Acceuil, site, psychoquiz, le goat plassart">
    </head>
    <header>
        <div class = "section1" >
        <img src="../assets/images/Logo-FLD.png" class="img-responsive" alt="">
        </div>
        <h1> Psychoquiz </h1>
    </header>
    <body>

        <?php 
            require('../back_end/include/_inc_parametres.php');
            require('../back_end/include/_inc_connexion.php');

            $current_question = isset($_GET['id']) ? (int)$_GET['id'] : 0;

            $sql = "SELECT MAX(IDQUESTION) AS max_id, IDQUESTION, LIBELLE, IDTYPEQUESTION 
                    FROM question 
                    WHERE IDQUESTION > ?  
                    ORDER BY IDQUESTION LIMIT 1";

            $stmt = $cnx->prepare($sql);
            $stmt->execute([$current_question]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$row) {
                $id_question = 0;
                $max_id = 0;
                $libelle_question = "Il n'y a pas de question suivante.";
            }
            else {
                $id_question = $row["IDQUESTION"];
                $libelle_question = $row["LIBELLE"];
                $max_id =$row["max_id"];
                $idtype = $row["IDTYPEQUESTION"];
            }

            $cnx = null;

            // Choisir le bon type de question Type1/Type2

            if ($idtype == 1) {
                $texte = "<label>" . $id_question . " - " . $libelle_question . " ? </label><br>";
                $texte .= '<input type="radio" href="?id=' . $id_question .  '" id="oui" name="reponse" value="oui" class="ON"/>';
                $texte .= '<label class="Gauche"> oui </label>';
                $texte .= "<br>";
                $texte .= '<input type="radio" href="?id=' . $id_question .  '" id="non" name="reponse" value="non" class="ON"/>';
                $texte .= '<label class="Gauche"> non </label>';
            } 
            
            elseif ($idtype == 2) {
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

            if ($id_question != $max_id) {
                $texte .= '<form action="quiz.php?' . http_build_query(array("id" => $id_question)) . '" method="post">';
                $texte .= '<div>';
                $texte .= '<button type="submit" name="submit" class="Suivant">Suivant</button>';
                $texte .= '</div>';
                $texte .= '</form>';
            } 
            else {
                $texte .= '<form action="resultat.php? method="post">';
                $texte .= '<div>';
                $texte .= '<button type="submit" name="submit" class="Suivant">Terminé</button>';
                $texte .= '</div>';
                $texte .= '</form>';
            }
        ?>
        

        <div class = "questions">
            <?php echo $texte; ?>
        </div>


        <footer class="text-center text-lg-start bg-white ">
            <div class = "section2">
                <div class="p-4" style="background-color: rgba(0, 0, 0, 0.025);">
                    © 2023 Copyright: TreizeOrganisé
                </div>
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>