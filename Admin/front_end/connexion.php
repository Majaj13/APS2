<?php 
session_start();
$bdd = new PDO('mysql: host= localhost; dbname=aps2; charset=utf8;', 'root', '');
if(isset ($_POST ['envoi'])){
      if(!empty($_POST ['pseudo']) AND !empty($_POST ['mdp'])) {
        $pseudo = htmlspecialchars ($_POST ['pseudo']);
        $mdp = ($_POST ['mdp']);

        $recupUser = $bdd -> prepare('SELECT * FROM users WHERE pseudo = ? AND mdp = ?');
        $recupUser->execute(array($pseudo, $mdp) ) ; 

        if($recupUser->rowCount () > 0){
            $_SESSION ['pseudo'] = $pseudo;
            $_SESSION ['mdp'] = $mdp;
            $_SESSION ['id'] = $recupUser->fetch() ['id'];
            header('Location: Admin.php');
        }else{
            echo "Votre mot de passe ou pseudo est incorrect";
        }
      }else{
          echo "Veuillez compléter tous les champs";
      }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>APS2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/png" href="../assets/images/Logo-FLD.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../assets/css/main.css" />
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
    <form method="POST" action="">
    <div class="centrer">
        <input type="text" name="pseudo" autocomplete="off" class="demarrer">
        <br>
        <input type="password" name="mdp" autocomplete="off" class="demarrer">
        <br>
        <button type="submit" name="submit" class="demarrer" href="">Démarrer</button>
    </div>
    </form>
</body>
<footer class="text-center text-lg-start bg-white ">
    <div class = "section2">
        <div class="p-4" style="background-color: rgba(0, 0, 0, 0.025);">
            © 2023 Copyright: TreizeOrganisé
        </div>
    </div>
</footer>
</html>