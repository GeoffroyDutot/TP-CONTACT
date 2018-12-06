<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
  s
    <link rel="stylesheet" href="../css/bootstrap.min.css" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">


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

      <form class="form-signin">
      <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Connectez-vous</h1>
      <label for="email" class="sr-only">Votre email :</label>
      <input type="email" id="email" class="form-control" placeholder="Adresse email" required autofocus>
      <label for="password" class="sr-only">Mot de passe :</label>
      <input type="password" id="password" class="form-control" placeholder="Mot de passe" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Se souvenir de moi
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
