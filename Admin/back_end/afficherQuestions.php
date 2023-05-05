<?php

// Connexion à la BDD

require('../back_end/include/_inc_parametres.php');
require('../back_end/include/_inc_connexion.php');

$id_admin = $_SESSION['id_admin'];  //rester connecter sur id_admin

var_dump($_SESSION);

$query = 'SELECT *        
          FROM question
          ORDER BY  IDQUESTION ASC';   //Sélectionné toutes les colonnes de la table question avec leur contenue
$stmt = $cnx->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<table>";   //Afficher les colonnes de questions sous forme de tableau html
echo "<tr><th>IDQUESTION</th><th>LIBELLE</th><th>ENJEU</th><th>IDTYPEQUESTION</th><th>IDSCOREFERMEE</th><th>IDSCORECH</th></tr>";

foreach ($result as $row)   //A chaque result afficher une ligne
{
    echo "<tr>";
    echo "<td>" . $row['IDQUESTION'] . "</td>";
    echo "<td>" . $row['LIBELLE'] . "</td>";
    echo "<td>" . $row['ENJEU'] . "</td>";
    echo "<td>" . $row['IDTYPEQUESTION'] . "</td>";
    echo "<td>" . $row['IDSCOREFERMEE'] . "</td>";
    echo "<td>" . $row['IDSCORECH'] . "</td>";
    echo '<td><a href="#" onclick="showConfirmation(' . $row['IDQUESTION'] . ')" class="btnSuppQuestion">Supprimer</a></td>';  // onclick vers showconfirmation pour avoir la confirmation de l'admin afind'éviter toute faute de frappe
    echo '<td><a href="ModifierQuestion.php" class="btnModifQuestion">Modifier</a></td>';
}

echo "</table>";

?>

<!-- Redirection vers le pop-up js -->

<script type="text/javascript" src="../back_end/javascript/script.js"></script>
