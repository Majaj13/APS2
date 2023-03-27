<?php
try
{
    $cnx = new PDO('mysql:host='.$HOTE.';port='.$PORT.';dbname='.$BDD, $USER, $PWD);
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (Exception $e)
{
    echo 'Erreur : '.$e->getMessage().'</br/>';
    echo 'N° : '.$e->getCode();
}                        
?>