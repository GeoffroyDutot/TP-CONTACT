<?php

session_start();

require_once 'config/bdd.php';
require_once 'contact.php';

try
{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=annuaire;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

?><!doctype html>
<html lang="Fr-fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<table class="table">
    <thead>
    <tr>
        <th>Prenom</th>
        <th>Nom</th>
        <th>Tel</th>
        <th>Email</th>
        <th>Id</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($contact as $contact): ?>
    <tr>
        <td><?php echo"$contact->getContact_Nom()"; ?></td>
        <td><?php echo"$contact->getContact_Prenom()"; ?></td>
        <td><?php echo"$contact->getContact_Tel()"; ?></td>
        <td><?php echo"$contact->getContact_Email()"; ?></td>
        <td><?php echo"$contact->getContact_Id()"; ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
