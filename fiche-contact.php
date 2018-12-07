<?php

// Ouverture de la session
session_start();
include('config/bdd.php');

    // Requête SQL
    $sql = 'SELECT * FROM contact WHERE contact_id = ?';
    $req = $bdd->prepare($sql);
    $req->execute(array($_SESSION['contact_id']));

while($row = $req->fetch()) {

    // On récupère les champs dans la base de données pour la session
    $_SESSION['contact_nom'] = $row['contact_nom'];
    $_SESSION['contact_prenom'] = $row['contact_prenom'];
}

echo $_SESSION['contact_nom'];