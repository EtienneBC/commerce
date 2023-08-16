<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dropship.commerce</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


  </head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <?php //On démarre une nouvelle session 
  session_start();
  /*On utilise session_id() pour récupérer l'id de session s'il existe. 
*Si l'id de session n'existe pas, session_id() rnevoie une chaine 
*de caractères vide*/
  $id_session = session_id(); ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="accueil.php">Dropship.commerce</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0 menuConnexion">
          <?php
          //On vérifie si la session existe
          if (isset($_SESSION['username'])) {
            //On affiche un message de bienvenue
            //On affiche un lien pour fermer la session
            echo '<li class="nav-item w-100"><p class="nav-link">Bonjour ' . $_SESSION['username'] . '!</p></li>';
            echo '<li class="nav-item w-100"><a class="nav-link" href="mdp.php">Changer le mot de passe</a></li>';
            echo '<li class="nav-item w-100"><a class="nav-link" href="deconnexion.php">Déconnexion</a></li>';
          } else {
            //On affiche un message d'erreur
            echo '<li class="nav-item text-warning">Vous n\'êtes pas connecté!</li>';
            echo '<li class="nav-item "><a class="nav-link" href="login.php">Se connecter</a></li>';
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
  <?php
  //On vérifie si la session existe, si oui on affiche le menu
  if (isset($_SESSION['username'])) {
    echo '
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
        <ul class="navbar-nav w-100 justify-content-between">
          <li class="nav-item">
            <a class="nav-link" href="toutProduits.php">Tous les produits</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="filtre.php">Filtrer les produits</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="recherche.php">Rechercher un produit</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ajout.php">Ajouter un produit</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>';

  } ?>