<?php
try
{
  $bdd = new PDO('mysql:host=127.0.0.1;dbname=annuaire;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

session_start();
include('config/bdd.php');
?>

<html>
<head>


 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>TP-CONTACT</title>

 </head>
 <body>



<h1>Profil</h1>

<?php

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
?>


</html>