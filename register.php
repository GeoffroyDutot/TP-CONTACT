<?php

session_start();
try
{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=?;charset=utf8', 'root', '');
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>

 </head>
 <body>


<h1>Compte</h1>

<center><form action=""  method="post">  



<?php
                        if(isset($_POST['Connexion'])) {
                           
                            $emailconnect = htmlspecialchars($_POST['email']);
                            $mdpconnect = sha1($_POST['mdp']);
                           
                            if(!empty($pseudoconnect) && !empty($mdpconnect)) {
                              $requser = $bdd->prepare("SELECT * FROM ? WHERE email = ? AND mdp = ?");
                              $requser->execute(array(
                                  $emailconnect,
                                  $mdpconnect
                              ));
                              $userexist = $requser->rowCount();
                              if($userexist == 1) {
                                 $userinfo = $requser->fetch();
                                 $_SESSION['id'] = $userinfo['id'];
                                 header("Location: ???????_?id=".$_SESSION['id']);
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
<input type="password" name="mdp" id="mdp" />
</p><br>
 
<?php if (isset($erreur_connexion)) {
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
                        $mdp = sha1($_POST['mdp']);
                       
 
                        if (!empty($_POST['email']) && !empty($_POST['mdp'])) {
                            
                                               $insertmbr = $bdd->prepare("INSERT INTO ? (email, mdp) VALUES(:email, :mdp)");
                                               $insertmbr->execute(array(
                                                   'email' => $_POST['email'],
                                                   'mdp' => $mdp
                                               
                                               ));

                                               header('location: Mon espace.php');

                                               }  else {
        $erreur = "Tous les champs doivent être complétés !";
         }
    }
                                               
                    

                      echo "Votre compte a bien été créer";
 
 
                    ?>


<p>
<label for="email">Votre e-mail :</label>
<input type="text" name="email" id="email" tabindex="30" />
<br />
</p><br>


<label for="password">Mot de passe :</label>
<input type="password" name="mdp" id="mdp" />
</p><br>




<?php
                        if(isset($erreur)) {
                        echo '<font color="red">'.$erreur."</font>";
                         }elseif (isset($reussi)) {
                             echo($reussi);
                         } 
                     ?>    <br>      

<input class="button" type="submit" name="Valider" value="Valider" onclick="self.location.href='traitement.php'" style="background-color:#" style="color:white; font-weight:bold"onclick> </center></form> </div>

<br><br><br> 


 </body>
</html>