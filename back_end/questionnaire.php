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