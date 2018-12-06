<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>TP-CONTACT</title>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

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
                        if(isset($erreur)) {
                        echo '<font color="red">'.$erreur."</font>";
                         }elseif (isset($reussi)) {
                             echo($reussi);
                         } 
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
