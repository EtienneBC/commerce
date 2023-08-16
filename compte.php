<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Création de compte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<?php
include "header.php";
?>
<h2>Veuillez créer un compte</h2>
<form method="post" action="compte.php">
    <label>Nom complet : </label>
    <input type="text" name="nom" /><br>
    <label>Username : </label>
    <input type="text" name="username" /><br>
    <label>Email : </label>
    <input type="email" name="email" /><br>
    <label>Mot de passe : </label>
    <input type="password" name="pwd" /><br>
    <input type="submit" name="compte" value="S'enregistrer" /><br>
</form>
<?php
include "connexionBD.php";
if(isset($_POST["compte"])){
    $nom = $_POST["nom"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    if (!empty($prenom) && !empty($email && !empty($age) && !empty($sexe) && !empty($pays))) {
    $insertionUser = $dbco->prepare("
    INSERT INTO utilisateurs(nomComplet, username, email, motDePasse)
    VALUES (:nomComplet, :username, :email, :motDePasse)
    ");
    $insertionUser->bindParam(':nomComplet', $nom); //On lie chaque marqueur à une valeur
    $insertionUser->bindParam(':username', $username);
    $insertionUser->bindParam(':email', $email);
    $insertionUser->bindParam(':motDePasse', $pwd);
    $insertionUser->execute();
    echo "<p class='ok'><b>Votre compte a été créée, vous pouvez maintenant vous <a href='login.php'>connecter</a></b></p>";
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