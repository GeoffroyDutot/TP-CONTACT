<?php
require_once 'Config.php';
require_once 'contact.php';

$host = 'lacalhost';
$port = 3306;
$database = 'annuaire';
$contact = array();
try {
    $driver = sprintf(
        "mysql:host=%s;port=%s;dbname=%s",
        Config::HOST,
        Config::PORT,
        Config::DATABASE
        );
    $pdo = new PDO(
        $driver,
        Config::LOGIN,
        Config::PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $pdo->exec("INSERT INTO clients (firstname, lastname) VALUES ('jane', 'die');");
//    var_dump("Le dernier ID est : " . $pdo->lastInsertId());
    $stmt = $pdo->query("SELECT * FROM contact;");
//    var_dump($stmt->fetchObject());
    while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
        $client = new Contact(
            $row['contact_prenom'],
            $row['contact_nom'],
            $row['contact_tel'],
            $row['contact_email'],
            $row['contact_id']
        );
        $clients[] = $client;
    }
//    var_dump($stmt);
} catch (PDOException $e) {
    var_dump($e->getMessage());
//    var_dump("Bad credentials");
} finally {
    $pdo = null;
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
        <td><?= $client->getcontact_prenom() ?></td>
        <td><?= $client->getcontact_nom() ?></td>
        <td><?= $client->getcontact_tel() ?></td>
        <td><?= $client->getcontact_email() ?></td>
        <td><?= $client->getcontact_id() ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
