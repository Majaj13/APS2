<?php
try
{
    $cnx = new PDO('mysql:host='.$HOTE.';port='.$PORT.';dbname='.$BDD, $USER, $PWD);
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $cnx->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
    echo 'Erreur : '.$e->getMessage().'</br/>';
    echo 'N° : '.$e->getCode();
}                        
?>
