<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="dashboard_css.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<meta charset="utf-8">
		<title>Dashboard</title>
	</head>
	<body>
		
		<a href="logout.php"><button type="button" class="btn btn-secondary btn-sm">Deconnexion</button></a

		<table>
		<thead>
		<tr>
			<th>id</th>
			<th>Nom</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>Jean pierre</td>
				<td><a href=<?php if (isset($_SESSION['id_membre']) >= 1) {
						echo "add_modif.php?id=" . $_SESSION['id_membre'];
						}else {
						echo "index";
						} ?>><button type="button" class="btn btn-secondary btn-sm">Modifier le contact</button></a>
				<a href="suppr.php"><button type="button" class="btn btn-secondary btn-sm">Supprimer le contact</button></a>
				</td>
			</tr>
		</tbody>
	</table>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	</body>
</html>