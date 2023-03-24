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
    <title>Connexion</title>
    <meta charset="utf-8">
</head>
<body>
    <form method="POST" action="">
      <input type="text" name="pseudo" autocomplete="off">
      <br>
      <input type="password" name="mdp" autocomplete="off"> <br><br>
      <input type="submit" name="envoi"> 
    </form>
</body>
</html>