<<<<<<< HEAD
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
=======
<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>TP-CONTACT</title>
>>>>>>> 3d354bc766b4c2e6c68e001a45fffd08f1bc88bd

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<<<<<<< HEAD
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
<?php
=======
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

</head>

<body>
<div class="container">

  <?php

      if (isset($_POST['Valider']))
                        {
                        $pseudo = htmlspecialchars($_POST['email']);
                        $mdp = sha1($_POST['password']);
                       
 
                        if (!empty($_POST['email']) && !empty($_POST['password'])) {
                            
                                               $insertmbr = $bdd->prepare("INSERT INTO utilisateurs (email, password) VALUES(:email, :password)");
                                               $insertmbr->execute(array(
                                                   'email' => $_POST['email'],
                                                   'password' => $mdp
                                               
                                               ));

                                               header('location: dashboard.php');

                                               }  else {
        $erreur = "Tous les champs doivent être complétés !";
         }
    }
                                               
                    

                    
 
 
                    ?>



<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
  <h4 class="card-title mt-3 text-center">Création d'un compte</h4>

  <form>
  <div class="form-group input-group">
    <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
     </div>
        <input name="email" class="form-control" placeholder="email" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
     </div>
        <input name="password" class="form-control" placeholder="password" type="password">
    </div> <!-- form-group// -->
   


    <div class="form-group">

      <?php
>>>>>>> 3d354bc766b4c2e6c68e001a45fffd08f1bc88bd
                        if(isset($erreur)) {
                        echo '<font color="red">'.$erreur."</font>";
                         }elseif (isset($reussi)) {
                             echo($reussi);
                         } 
<<<<<<< HEAD
                     ?>    <br>   
  </body>
</html>
=======
                     ?>  
        <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
    </div> <!-- form-group// -->
    <p class="text-center">Have an account? <a href="">Log In</a> </p>
</form>
</article>
</div> 

</div>

</body>
</html>
>>>>>>> 3d354bc766b4c2e6c68e001a45fffd08f1bc88bd
