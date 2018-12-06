
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
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
 <body>
    <a href="index.php"><button type="button">Accueil</button></a>

    <form action="" method="post">
      <?php 
        if (isset($_POST['inscription'])) {
                  
          $mail = htmlspecialchars($_POST['email']);
          $mail_conf = htmlspecialchars($_POST['conf_email']);
          $mdp = sha1($_POST['password']);
          $mdp_conf = sha1($_POST['conf_password']);
          $mdplentgh = strlen($_POST['password']);
                  
          if (!empty($_POST['email']) && !empty($_POST['conf_email']) && !empty($_POST['password']) && !empty($_POST['conf_password'])) {
            if ($mail == $mail_conf) {
              if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                        $reqmail = $bdd->prepare("SELECT email FROM utilisateurs WHERE email = ?");
                                $reqmail->execute(array($mail));
                                $mailexist = $reqmail->rowCount();
                                if ($mailexist == 0) {
                                  if ($mdplentgh >= 8) {
                                    if ($mdp == $mdp_conf) {
                                      $insertmbr = $bdd->prepare("INSERT INTO utilisateurs(email, password) VALUES(:email, :password)");
                                      $insertmbr->execute(array(
                                        'email' => $_POST['email'],
                                        'password' => $mdp,
                                      ));
                                      $reussi = "<font color=\"green\">Votre compte a été crée !</font>";
                                    }else {
                                    $erreur = "Vos mots de passes ne correspondent pas !";
                                    }
                                }else{
                                  $erreur = "Mot de passe trop court !";
                                }
                                }else {
                                  $erreur = "Adresse mail déjà utilisée !";
                                }
                      }
                    }else {
                          $erreur = "Vos adresses mail ne correspondent pas !";
                        }
                  }else {
                      $erreur = "Tous les champs doivent être complétés !";
                    }           
                }
                
              ?>

      <label for="email">Votre e-mail :</label><br>
      <input type="email" name="email" required="" id="email" tabindex="30" /><br>
      <label>Confirmation du mail</label><br>
      <input type="email" required="" name="conf_email"><br>
      <label for="password">Mot de passe :</label><br>
      <input type="password" name="password" id="password" /><br>
      <label>Confirmation mdp</label><br>
      <input type="password" name="conf_password"><br>
      <input class="button" type="submit" name="inscription" value="Je m'inscrit"> 
    </form>
  </body>
</html>
