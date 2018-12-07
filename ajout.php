<?php
//Ouverture de la page

//Définition de l'encodage de la page
header('Content-Type: text/html; charset=utf-8');

//On accède à la base de données
include('config/bdd.php');


//Récupération des valeurs
$contact_nom = $_POST['contact_nom'];
$contact_prenom = $_POST['contact_prenom'];
$contact_tel = $_POST['contact_tel'];
$contact_email = $_POST['contact_email'];

//On vérifie si la variable $contact_id n'est pas vide
$test = empty($contact_id);
if($test == false) {

//Connexion à la base de données
    try
    {
        $bdd->exec('SET NAMES utf8');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }


//Préparation de l'envoi des données vers la base de données
    $req = $bdd->prepare("INSERT INTO contact(contact_nom, contact_prenom, contact_tel, contact_email) VALUES(:contact_nom, :contact_prenom, :contact_tel, :contact_email)");

//Exécution de la requête
    $req->execute(array(
        'contact_nom' => $_POST['contact_nom'],
        'contact_prenom' => $_POST['contact_prenom'],
        'contact_tel' => $_POST['contact_tel'],
        'contact_email' => $_POST['contact_email']
    ));


}

//Si la variable $contact_id est vide, on renvoit un message
else{
    echo "Erreur";
}