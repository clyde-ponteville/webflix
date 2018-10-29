<?php
  // Inclusion du fichier functions
  // require_once(__DIR__.'/../config/functions.php');
  // Inclusion du fichier config
  require_once(__DIR__.'/../config/config.php');
  // Inclusion du fichier database
  require_once(__DIR__.'/../config/database.php');
  
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/favicon.ico">

    <title>
      <?php
        if (empty($currentPageTitle)) { // Si on est sur la page d'accueil
          echo $siteName . ' - Accueil';
        } else { // Si on est sur une autre page
          echo $currentPageTitle . ' - ' . $siteName;
        }
      ?>
    </title>


    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/signin.css" rel="stylesheet">

  </head>

  <body>

    <nav class="navbar navbar-expand-md">
      <a class="navbar-brand" href="index.php"><?php echo $siteName; ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-webflix">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar-webflix">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?php echo ($currentPageUrl === 'index') ? 'active' : ''; ?>">
            <a class="nav-link" href="index.php">Accueil</a>
          </li>          
          <li class="nav-item <?= ($currentPageUrl === 'movie_add') ? 'active' : ''; ?>">
            <a class="nav-link" href="movie_add.php">Ajouter un film</a>
          </li>
        </ul>
        <div class="justify-content-end">
          <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modalConnexion">Connexion</button>
        </div>
          
      </div>
    </nav>

    <!--Modal -->
<div class="modal fade" id="modalConnexion" tabindex="-1" role="dialog" aria-labelledby="modalCenterCo" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <ul class="nav nav-tabs connect">
          <li class="nav-item">
            <a id="linkSign" class="nav-link" href="#connexion">Connexion</a>
          </li>
          <li class="nav-item">            
            <a id="linkCreate" class="nav-link" href="#sign_in">Créer un compte</a>
          </li>        
        </ul>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="signin" class="form-signin" action="user_connect.php">                    
          <label for="inputEmail" class="sr-only">Email address</label>
          <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="btn btn-lg btn-success btn-block" type="submit">Connexion</button>
          <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
        </form>
        <form id="create" class="form-signin create" action="user_add.php">

          <label for="mail" class="sr-only">Email address</label>
          <input type="email" id="mail" class="form-control" placeholder="Email address" required autofocus>

          <label for="username" class="sr-only">Username</label>
          <input type="text" id="username" class="form-control" placeholder="Username" required>

          <label for="pwd" class="sr-only">Password</label>
          <input type="password" id="pwd" class="form-control" placeholder="Password" required>

          <label for="Confirm_pwd" class="sr-only">Confirm password</label>
          <input type="password" id="Confirm_pwd" class="form-control" placeholder="Confirm Password" required>
          
          <input class="btn btn-lg btn-primary btn-block" type="submit" value="Créer un compte">
          <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
        </form>
      </div>
      
    </div>
  </div>
</div>
