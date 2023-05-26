<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Questions | administrateur</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Page de gestion des statistiques">
  <link rel="stylesheet" type="text/css" media="screen"
href="../assets/css/main.css">
  <link rel="icon" type="image/x-icon" href="../assets/images/Logo-FLD.png">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<header>
    <img src="../assets/images/Logo-FLD.png" alt="fld">
</header>

<body>
  <?php
  $dsn = 'mysql:host=localhost;dbname=aps2;charset=utf8';
  $username = 'root';
  $password = '';

  try 
  {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } 
  catch (PDOException $e) 
  {
    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
    exit();
  }

  $query = "SELECT NOM 
            FROM origine 
            ORDER BY NOM";
  $statement = $pdo->prepare($query);
  $statement->execute();

  $data = $statement->fetchAll(PDO::FETCH_COLUMN);
  $labels = array_map(function ($name) 
  {
    return htmlspecialchars($name);
  }, $data);

  $query = "SELECT SUM(CASE WHEN SEXE = 'M' THEN 1 ELSE 0 END) AS count_m,
                   SUM(CASE WHEN SEXE = 'F' THEN 1 ELSE 0 END) AS count_f,
                   SUM(CASE WHEN SEXE = 'A' THEN 1 ELSE 0 END) AS count_a,
                   ORIGINE.NOM AS nom_origine,
                   ORIGINE.IDORIGINE AS id_origine
            FROM ORIGINE
            LEFT OUTER JOIN SONDE on ORIGINE.IDORIGINE = SONDE.IDORIGINE
            GROUP BY  ORIGINE.NOM
            ORDER BY ORIGINE.NOM";

  $statement = $pdo->prepare($query);
  $statement->execute();

  $results = $statement->fetchAll(PDO::FETCH_ASSOC);
  $data_m = array_column($results, 'count_m'); 
  $data_f = array_column($results, 'count_f'); 
  $data_a = array_column($results, 'count_a');

  ?>

  <canvas id="statistiques"></canvas>

  <script>
  // Fonction pour créer l'histogramme avec les données
  function createChart(data_m, data_f, data_a, labels) {
    var canvas = document.getElementById('statistiques');
    var ctx = canvas.getContext('2d');

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: labels, // Utilisation des labels des établissements
        datasets: [
          {
            label: 'Hommes',
            data: data_m, // Utilisation des données récupérées via
//PHP pour les hommes
            backgroundColor: 'rgba(0, 123, 255, 0.5)',
            borderColor: 'rgba(0, 123, 255, 1)',
            borderWidth: 1
          },
          {
            label: 'Femmes',
            data: data_f, // Utilisation des données récupérées via
//PHP pour les femmes
            backgroundColor: 'rgba(255, 0, 0, 0.5)',
            borderColor: 'rgba(255, 0, 0, 1)',
            borderWidth: 1
          },
          {
            label: 'Autres',
            data: data_a, // Utilisation des données récupérées via
//PHP pour les autres
            backgroundColor: 'rgba(0, 255, 0, 0.5)',
            borderColor: 'rgba(0, 255, 0, 1)',
            borderWidth: 1
          }
        ]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true,
            max: 100 // Définir la valeur maximale de l'axe y à 100
          }
        }
      }
    });
  }

  // Appeler la fonction pour créer les statistiques avec les données
//récupérées via PHP
  createChart(<?php echo json_encode($data_m); ?>, <?php echo
json_encode($data_f); ?>, <?php echo json_encode($data_a); ?>, <?php
echo json_encode($labels); ?>);

</script>

</body>
</html>