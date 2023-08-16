<?php
$servname = "localhost"; $dbname = "commerce"; $port = 3306; $user = "root"; $pass = "";
try{
$dbco = new PDO("mysql:host=$servname;dbname=$dbname;port=$port", $user, $pass);
$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
echo "Erreur : " . $e->getMessage();
}
?>