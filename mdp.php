<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Changer le mot de passe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <?php
    include "header.php";
    ?>
    <h2>Changer votre mot de passe</h2>
    <form method="post" action="mdp.php">
        <label>Ancien mot de passe </label>
        <input type="text" name="motDePasse" /><br>
        <label>Nouveau mot de passe </label>
        <input type="text" name="NouveauMDP" /><br>
        <input type="submit" name="MDP" value="Ajouter" /><br>
    </form>
    <?php
    include "connexionBD.php";
    if (isset($_POST["MDP"])) {
        $motDePasse = $_POST["motDePasse"];
        $NouveauMDP = $_POST["NouveauMDP"];
        $username = $_SESSION['username'];
        $requete = "SELECT * FROM utilisateurs WHERE username = '$username'";
        $result = $dbco->query($requete);
        $tableau = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($tableau as $ligne) {
            if ($ligne['motDePasse'] == $motDePasse) {
                $insertionMDP = $dbco->prepare("
            UPDATE utilisateurs SET motDePasse = :motDePasse WHERE username = :username
            ");
                $insertionMDP->bindParam(':motDePasse', $NouveauMDP);
                $insertionMDP->bindParam(':username', $username);
                $insertionMDP->execute();
                echo "<p class='ok'><b>Mot de passe changé avec succès</b></p>";
            } else {
                echo "<p class='error'><b>Mot de passe incorrect</b></p>";
            }
        }
    }
    ?>
    <p>Revenir vers l'<a href="accueil.php">accueil</a></p>
    <?php
    include "footer.php";
    ?>
</body>

</html>