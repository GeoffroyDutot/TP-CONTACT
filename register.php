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





<h1>Inscription </h1>



	<center><form action="" method="post">

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


<p>
<label for="email">Votre e-mail :</label>
<input type="text" name="email" id="email" tabindex="30" />
<br />
</p><br>


<label for="password">Mot de passe :</label>
<input type="password" name="password" id="password" />
</p><br>




<?php
                        if(isset($erreur)) {
                        echo '<font color="red">'.$erreur."</font>";
                         }elseif (isset($reussi)) {
                             echo($reussi);
                         } 
                     ?>    <br>      

<input class="button" type="submit" name="Valider" value="Valider"> </center></form> </div>

<br><br><br> 


 </body>
</html>