<?php
//Ouverture de la page

//Définition de l'encodage de la page
header('Content-Type: text/html; charset=utf-8');
include('config/bdd.php');


//Récupération des valeurs
$contact_id = $_POST['contact_id'];

// Connexion à la base de données
try
{
    $bdd->exec('SET NAMES utf8');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}


// Préparation de l'envoi des données vers la base de données
$req = $bdd->prepare("DELETE FROM contact WHERE contact_id = $contact_id");

// Exécution de la requête
$req->execute();
