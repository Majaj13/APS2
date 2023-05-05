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

    <?php include('../back_end/questionnaire.php'); ?>

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