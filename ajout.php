<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajout de produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <?php
    include "header.php";
    ?>
    <h2 class="py-5">Ajouter un produit</h2>
    <form method="post" action="ajout.php" class="container w-25">
        <div class="align-items-center">
            <input required type="text" name="nom" class="form-control my-1" placeholder="Nom:" />
            <input required type="text" name="prix" class="form-control my-1" placeholder="Prix:" />
            <input required type="text" name="image" class="form-control my-1" placeholder="Image:" />
            <select required name="categorie" class="form-select my-1">
                <option value="" disabled selected>Catégorie:</option>
                <option value="Mode">Mode</option>
                <option value="Bijoux">Bijoux</option>
                <option value="Électronique">Électronique</option>
            </select>
        </div>
        <div class="align-items-center py-3">
            <input type="submit" name="ajout" value="Ajouter" class="btn btn-primary w-100" />
        </div>
    </form>
    <?php
    include "connexionBD.php";
    if (isset($_POST["ajout"])) {
        $nom = $_POST["nom"];
        $prix = $_POST["prix"];
        $image = $_POST["image"];
        $categorie = $_POST["categorie"];
        if (!empty($nom) && !empty($prix) && !empty($image) && !empty($categorie)) {
            $insertionProduits = $dbco->prepare("

    INSERT INTO produits(id, nom, prix, image, categorie)
    VALUES (NULL, :nom, :prix, :image, :categorie)
    ");
            $insertionProduits->bindParam(':nom', $nom); //On lie chaque marqueur à une valeur
            $insertionProduits->bindParam(':prix', $prix);
            $insertionProduits->bindParam(':image', $image);
            $insertionProduits->bindParam(':categorie', $categorie);
            $insertionProduits->execute();
            echo "Le produit a été créé avec succès";
            echo "<script>alert('L'ajout est effectué');</script>";
        } else {
            echo "<p class='no'>Veuillez remplir tous les champs</p>";
        }
    }
    ?>
    <?php
    include "footer.php";
    ?>
</body>

</html>