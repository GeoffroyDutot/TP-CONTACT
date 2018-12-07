<?php

session_start();
try
{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=annuaire;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<link rel="stylesheet" type="text/css" href="dashboard_css.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<meta charset="utf-8">
		<title>Dashboard</title>
	</head>
	<body>

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nom</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $reqcontact = $bdd->query("SELECT * FROM contact");

  while ($recup = $reqcontact->fetch()){
      ?>
    <tr>
      <th><?php echo $recup['contact_id']?></th>
      <td><?php echo $recup['contact_nom']?></td>
      <td><a href="fiche-contact.php"><button type="button" class="btn btn-secondary btn-sm">Voire profil</button></a>
        <a href=""><button type="button" class="btn btn-secondary btn-sm">Modifier le contact</button></a>
        <a href="suppr.php"><button type="button" class="btn btn-secondary btn-sm">Supprimer le contact</button></a>
        </td>
     </tr>
    <?php
        }
    ?>
  </tbody>
</table>
				
			</tr>
		</tbody>
	</table>
  <a href="nouveau.php"> <button type="button">Ajouter</button></a><br><br>
  	<a href="logout.php"><button type="button" class="btn btn-secondary btn-sm">Deconnexion</button></a>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>
