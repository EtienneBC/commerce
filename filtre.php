<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Filtrer les produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <?php
    include "connexionBD.php";
    include "header.php";
    ?>
    <h2 class="py-5">Filtrer les produits</h2>
    <form method="post" action="filtre.php">
        <div class="container w-25 py-3">
            <select required class="form-select" name="categorie">
                <option value="" disabled selected>Catégorie:</option>
                <option value="Mode">Mode</option>
                <option value="Bijoux">Bijoux</option>
                <option value="Électronique">Électronique</option>
            </select><br>
            <select required class="form-select" name=prix>
                <option value="" disabled selected>Ordre:</option>
                <option value="ASC">Croissant</option>
                <option value="DESC">Decroissant</option>
            </select><br>
            <input type="submit" name="filtreSelection" value="Filtrer" class="btn btn-primary w-100" /><br>
        </div>
    </form>
    <div class="w-75 row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4 mx-auto pb-5">
        <?php
        include "connexionBD.php";
        if (isset($_POST["filtreSelection"])) {
            $categorie = $_POST["categorie"];
            $prix = $_POST["prix"];
            $requete = "SELECT * FROM produits WHERE categorie = '$categorie' ORDER BY prix $prix";
            $result = $dbco->query($requete);
            $tableau = $result->fetchAll(PDO::FETCH_ASSOC);
            foreach ($tableau as $ligne) { ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="<?= $ligne['image'] ?>" class="card-img-top" alt="<?= $ligne['nom'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $ligne['nom'] ?></h5>
                            <p class="card-text"><?= $ligne['categorie'] ?></p>
                            <p class="card-text">Prix: <?= $ligne['prix'] ?> $</p>
                        </div>
                        <div class="card-footer">
                            <form method="POST" action="majPrix.php">
                                <input type="hidden" name="product_id" value="<?= $ligne['id'] ?>">
                                <input type="hidden" name="old_price" value="<?= $ligne['prix'] ?>">
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control w-50" name="nouveauPrix" value="<?= $ligne['prix'] ?>" aria-label="New price" aria-describedby="button-update-price">
                                    <button class="btn btn-primary text-truncate w-50" type="submit" name="majPrix" id="button-update-price">Modifier le prix</button>
                                </div>
                            </form>
                            <form method="POST" action="suprimerProduit.php">
                                <input type="hidden" name="product_id" value="<?= $ligne['id'] ?>">
                                <button class="btn btn-danger" type="submit" name="suprimerProduit">Suprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
    </div>
<?php
        }
        include "footer.php";
?>