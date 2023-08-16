<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Changer le prix d'un article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<?php
include "connexionBD.php";
$dbco = mysqli_connect($servname, $user, $pass, $dbname, $port);
if(isset($_POST['majPrix'])) {
    $product_id = $_POST['product_id'];
    $new_price = $_POST['nouveauPrix'];
    // Mettre à jour le prix du produit avec l'identifiant spécifié
    $query = "UPDATE produits SET prix='$new_price' WHERE id='$product_id'";
    if(mysqli_query($dbco, $query)) {
        // Prix mis à jour avec succès
        echo "Produit mis à jour avec succès" . "<br>" . "<a href='accueil.php'>Retour à l'accueil</a>";
    } else {
        // Erreur de mise à jour du prix
        echo "Erreur de mise à jour du produit: " . mysqli_error($dbco);
    }
}
if (isset($_POST['majCategorie'])) {
    $product_id = $_POST['product_id'];
    $new_categorie = $_POST['categorie'];
    // Mettre à jour la catégorie du produit avec l'identifiant spécifié
    $query = "UPDATE produits SET categorie='$new_categorie' WHERE id='$product_id'";
    if(mysqli_query($dbco, $query)) {
        // Catégorie mise à jour avec succès
        echo "Produit mis à jour avec succès" . "<br>" . "<a href='accueil.php'>Retour à l'accueil</a>";
    } else {
        // Erreur de mise à jour de la catégorie
        echo "Erreur de mise à jour du produit: " . mysqli_error($dbco);
    }
}
if (isset($_POST['majImage'])) {
    $product_id = $_POST['product_id'];
    $new_image = $_POST['Image'];
    // Mettre à jour l'image du produit avec l'identifiant spécifié
    $query = "UPDATE produits SET image='$new_image' WHERE id='$product_id'";
    if(mysqli_query($dbco, $query)) {
        // Image mise à jour avec succès
        echo "Produit mis à jour avec succès" . "<br>" . "<a href='accueil.php'>Retour à l'accueil</a>";
    } else {
        // Erreur de mise à jour de l'image
        echo "Erreur de mise à jour du produit: " . mysqli_error($dbco);
    }
}
mysqli_close($dbco);
?>
</html>

