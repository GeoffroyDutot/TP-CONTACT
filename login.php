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
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TP-CONTACT</title>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
<div class="col-md-12">
  <div class="modal-dialog" style="margin-bottom:0">
    <div class="modal-content">
      <div class="panel-heading">
        <h3 class="panel-title">Connexion</h3>
      </div>
        <div class="panel-body">
          <form method="POST" action="">
            <?php // formulaire de connexion
            if(isset($_POST['Connexion'])) {
                
                $mailconnect = htmlspecialchars($_POST['email']);
                $mdpconnect = sha1($_POST['password']);
                // Vérification de la valiter des information entré
                if(!empty($mailconnect) && !empty($mdpconnect)) {
                  $requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE email = ? AND password = ?");
                  $requser->execute(array(
                    $mailconnect, 
                    $mdpconnect
                  ));
                  $userexist = $requser->rowCount();
                  if($userexist == 1) {
                     $userinfo = $requser->fetch();
                     $_SESSION['utilisateur_id'] = $userinfo['utilisateur_id'];
                     header("Location: dashboard.php?id=".$_SESSION['utilisateur_id']);
                  } else {
                     $erreur_connexion = "Mauvais mail ou mot de passe !";
                  }
               } else {
                  $erreur_connexion = "Tous les champs doivent être complétés !";
               }
            }
          ?>
                <fieldset>
                  <div class="form-group">
                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
                  </div>
                  <div class="form-group">
                    <input class="form-control" placeholder="Mot de passe" name="password" type="password" value="">
                  </div>
                    <input class="button" type="submit" name="Connexion" value="Connexion" <a href="profil.php"></a>
                    <?php if (isset($erreur_connexion)) {
                      echo("<font color=\"red\">" . $erreur_connexion . "</font><br><br>");
                          } 
                    ?>
                    <a href="register.php"><button type="button">S'incrire</button></a>
                </fieldset>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
  </body>
</html>
