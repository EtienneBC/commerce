<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Suppression de produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<?php
include("connexionBD.php");
$connexion = mysqli_connect($servname, $user, $pass, $dbname, $port);
if (isset($_POST['suprimerProduit'])) {
    $product_id = $_POST['product_id'];
    
    // Requête SQL pour supprimer le produit avec l'identifiant spécifié
    $query = "DELETE FROM produits WHERE id = '$product_id'";
    
    if (mysqli_query($connexion, $query)) {
        // Produit supprimé avec succès
        echo "Produit supprimé avec succès" . "<br>" . "<a href='accueil.php'>Retour à l'accueil</a>" ;
    } else {
        // Erreur lors de la suppression d'un produit
        echo "Erreur lors de la suppression d'un produit: " . mysqli_error($connexion);
    }
}
mysqli_close($connexion);
?>
