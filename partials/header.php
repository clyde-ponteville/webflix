<?php
  // Inclusion du fichier functions
  // require_once(__DIR__.'/../config/functions.php');
  // Inclusion du fichier config
  require_once(__DIR__.'/../config/config.php');
  // Inclusion du fichier database
  // require_once(__DIR__.'/../config/database.php');
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
          echo $siteName . ' - Webflix';
        } else { // Si on est sur une autre page
          echo $currentPageTitle . ' - ' . $siteName;
        }
      ?>
    </title>

    <link href="https://fonts.googleapis.com/css?family=Charmonman:400,700" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php"><?php echo $siteName; ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-pizzastore">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar-pizzastore">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?php echo ($currentPageUrl === 'index') ? 'active' : ''; ?>">
            <a class="nav-link" href="index.php">Accueil</a>
          </li>
          <li class="nav-item <?= ($currentPageUrl === '#') ? 'active' : ''; ?>">
            <a class="nav-link" href="#">Liste des films</a>
          </li>
          <li class="nav-item <?= ($currentPageUrl === '#') ? 'active' : ''; ?>">
            <a class="nav-link" href="#">Ajouter un film</a>
          </li>
        </ul>
      </div>
    </nav>
