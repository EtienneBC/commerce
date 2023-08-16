<?php
include "connexionBD.php";

// Retrieve the product ID from the query parameter
$productID = $_GET['id'];

// Fetch the product details from the database using the product ID
$requete = "SELECT * FROM produits WHERE id = :productID";
$statement = $dbco->prepare($requete);
$statement->bindParam(':productID', $productID);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);

// Display the product details
if ($product) {
?>
    <?php
    include "header.php";
    ?>
    <div class="container row my-5 mx-auto">
        <h1 class="">Modifier un produit</h1>
        <div class="w-sm-100 w-md-50 col">
            <img class="my-5 img-fluid w-50" src="<?= $product['image'] ?>" alt="<?= $product['nom'] ?>">
        </div>
        <div class="w-sm-100 w-md-50 col-12 col-md-6 mt-5">
            <div class="left">
                <h2 class=""><?= $product['nom'] ?></h2>
                <p>Prix actuel: <span class="text-primary"><?= $product['prix'] ?>$</span></p>
                <p>Catégorie: <span class="text-primary"><?= $product['categorie'] ?></span></p>
            </div>
            <form method="POST" action="majPrix.php" class="py-3">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                <div class="input-group">
                    <input required type="number" step="any" class="form-control w-50" name="nouveauPrix" placeholder="Nouveaux prix:" aria-label="New price">
                    <button class="btn btn-primary text-truncate w-50" type="submit" name="majPrix" id="majPrix">Modifier le prix</button>
                </div>
            </form>
            <form method="POST" action="majPrix.php" class="row input-group mx-0 px-0">
                <select required class="form-select" name="categorie">
                    <option value="" disabled selected>Catégorie:</option>
                    <?php
                    include "connexionBD.php";

                    // Fetch all the categories from the database
                    $requete = "SELECT DISTINCT categorie FROM produits";
                    $result = $dbco->query($requete);
                    $categories = $result->fetchAll(PDO::FETCH_ASSOC);

                    // Generate the options for each category
                    foreach ($categories as $category) {
                        echo '<option value="' . $category['categorie'] . '">' . $category['categorie'] . '</option>';
                    }
                    ?>
                </select>
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                <button class="btn btn-primary text-truncate w-50" type="submit" name="majCategorie" id="majCategorie">Modifier la catégorie</button>
            </form>

            <form method="POST" class="py-3 " action="majPrix.php">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                <div class="input-group">
                    <input required type="text" class="form-control" name="Image" placeholder="URL de l'image:" aria-label="Image">
                    <button class="btn btn-primary text-truncate w-50" type="submit" type="submit" name="majImage" id="majImage">Modifier l'image</button>
                </div>
            </form>

            <form method="POST" action="suprimerProduit.php" class="left">
                <input required type="hidden" name="product_id" value="<?= $product['id'] ?>">
                <button class="btn btn-danger" type="submit" name="suprimerProduit">Suprimer le produit</button>
            </form>
        </div>
    </div>

<?php
} else {
    echo "Le produit n'existe pas.";
}
?>
<?php
include "footer.php";
?>