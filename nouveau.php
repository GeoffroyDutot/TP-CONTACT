<?php


?><DOCTYPE html>
<html lang="fr">
<meta charset="utf-8">
<head>
	<title>new</title>
</head>
<body>

<h1>ajout ou modifidation de contact</h1>

<form type="POST" action="ajout.php">
<table>
    <tr>
        <td>Nom :</td>
        <td><input type="text" name="contact_nom"></td>
    </tr>
    <tr>
        <td>Prenom : </td>
        <td><input tupe="text" name="contact_prenom"></td>
    </tr>
    <tr>
        <td>Telephone : </td>
        <td><input type="text" name="contact_tel"></td>
    </tr>
    <tr>
        <td>Email :</td>
        <td><input type="email" name="contact_email"></td>
    </tr>
</table>

    <input type ="submit" value="VALIDER">

</form>

</body>
</html>