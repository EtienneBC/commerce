<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tout nos produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>

<body class="pb-5">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <?php include "header.php"; ?>
    <h2 class="py-5">Tout les produits</h2>
    <div class="w-75 row row-cols-1 row-cols-md-3 row-cols-lg-5 g-4 mx-auto pb-5">
        <?php
        include "connexionBD.php";
        $requete = "SELECT * FROM produits";
        $result = $dbco->query($requete);
        $tableau = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($tableau as $ligne) { ?>
            <div class="col produce">
                <a href="pageProduit.php?id=<?= $ligne['id'] ?>" class="linkProduce">
                    <div class="card h-100">
                        <img src="<?= $ligne['image'] ?>" class="card-img-top" alt="<?= $ligne['nom'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $ligne['nom'] ?></h5>
                            <p class="card-text"><?= $ligne['categorie'] ?></p>
                            <p class="card-text">Prix: <?= $ligne['prix'] ?> $</p>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
    <?php include "footer.php"; ?>