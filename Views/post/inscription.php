<?php

require_once 'C:\xampp\htdocs\Projet-BonneFete\Views\head.php';

use App\Controllers\ProfilController;

?>
<h2>Inscription</h2>

<form action="../post/inscription" method="post">

  <label for="nom_profil">Nom d'utilisateur:</label><br>
  <input type="text" id="nom_profil" name="nom_profil"><br>

  <label for="email_profil">Email:</label><br>
  <input type="email" id="email_profil" name="email_profil"><br>

  <label for="mdp_profil">Mot de passe:</label><br>
  <input type="password" id="mdp_profil" name="mdp_profil"><br>

  <button type="submit">S'inscrire</button>

</form>

<?php require_once 'C:\xampp\htdocs\Projet-BonneFete\Views\foot.php' ?>
</body>

</html>