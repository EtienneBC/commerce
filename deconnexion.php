<?php
session_start();
session_destroy();
echo "<p class='ok'><b>Vous êtes déconnecté, vous pouvez vous <a href='login.php'>connecter</a> ou <a href='compte.php'>créer un compte</a></b></p>";
?>