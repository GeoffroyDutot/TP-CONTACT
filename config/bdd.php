<?php
try
{
    $username = "root";
    $password = "";
    $bdd = new PDO('mysql:host=localhost;dbname=annuaire', $username, $password);
}
catch (Exception $e)
{
// En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}
?>
