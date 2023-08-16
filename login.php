<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <h2>Veuillez vous connecter</h2>
    <form method="post" action="login.php">
        <label>Nom d'utilisateur : </label>
        <input type="text" name="username" /><br>
        <label>Mot de passe : </label>
        <input type="password" name="pwd" /><br>
        <input type="submit" name="connect" value="Se connecter" /><br>
        <input type="button" onclick="location.href='compte.php'" value="Créer un compte" />
    </form>
    <?php
    include "connexionBD.php";
    if (isset($_POST["connect"])) {
        $username = $_POST["username"];
        $pwd = $_POST["pwd"];
        $connect = $dbco->prepare("
    SELECT COUNT(*) as 'Nombre' FROM utilisateurs WHERE username = :username AND motDePasse = :motDePasse
    ");

        $connect->bindParam(':username', $username);
        $connect->bindParam(':motDePasse', $pwd);
        session_start(); 
        $connect->execute();
        $resultat = $connect->fetch(PDO::FETCH_ASSOC); 
        if ($resultat['Nombre'] == 0) {
            echo "<p class='error'><b>Crédentiels invalides, vérifiez vos informations ou créez un compte</b></p>";
        } else {
            echo "<p class='ok'><b>Crédentiels valides, vous pouvez accéder à <a href='accueil.php'>l'accueil</a> </b></p>";
            $_SESSION['username'] = $username;
        }
    }
    ?>
    <?php
    include "footer.php";
    ?>
</body>
</html>