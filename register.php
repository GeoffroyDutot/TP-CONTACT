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


<h1>Compte</h1>

<center><form action=""  method="post">  



<?php
                        if(isset($_POST['Connexion'])) {
                           
                            $emailconnect = htmlspecialchars($_POST['email']);
                            $mdpconnect = sha1($_POST['password']);
                           
                            if(!empty($pseudoconnect) && !empty($mdpconnect)) {
                              $requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE email = ? AND password = ?");
                              $requser->execute(array(
                                  $emailconnect,
                                  $mdpconnect
                              ));
                              $userexist = $requser->rowCount();
                              if($userexist == 1) {
                                 $userinfo = $requser->fetch();
                                 $_SESSION['utilisateur_id'] = $userinfo['utilisateur_id'];
                                 header("Location: dashboard.php?id=".$_SESSION['utilisateur_id']);
                              } else {
                                 $erreur_connexion = "Mauvais pseudo ou mot de passe !";
                              }
                           } else {
                              $erreur_connexion = "Tous les champs doivent être complétés !";
                           }
                        }
                    ?>

                        
  <label for="email">Votre pseudo :</label> 
  <input type="text" name="email" />


<p>
<label for="password">Mot de passe :</label>
<input type="password" name="mdp" id="password" />
</p><br>
 
<?php 

if (isset($erreur_connexion)) {
                        echo("<font color=\"red\">" . $erreur_connexion . "</font><br><br>");
                    } ?>



<input class="button" type="submit" name="Connexion" value="Connexion" <a href="profil.php"></a>
                        </form></center> 








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