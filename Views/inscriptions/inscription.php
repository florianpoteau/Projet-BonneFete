<?php
require_once __DIR__ . '../../../vendor/autoload.php';

require_once 'C:\xampp\htdocs\Projet-BonneFete\DotEnv.php';

use DevCoder\DotEnv;

(new DotEnv(__DIR__ . '../../../.env'))->load();

$servername = getenv('DB_HOST');
$dbname = getenv('DB_NAME');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');


// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//   die("Erreur de connexion: " . $conn->connect_error);
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   $nom = $_POST['nom'];
//   $email = $_POST['email'];
//   $mdp = $_POST['mdp'];

//   $sql = "INSERT INTO profil (nom_profil, email_profil, mdp_profil)
//     VALUES ('$nom', '$email', '$mdp')";

//   if ($conn->query($sql) === TRUE) {
//     echo "Inscription réussie!";
//   } else {
//     echo "Erreur: " . $sql . "<br>" . $conn->error;
//   }
// }

// $conn->close();
?>

<!DOCTYPE html>
<html>

<head>
  <title>Page d'Inscription</title>
</head>

<body>
  <h2>Inscription</h2>
  <form method="post" action="">
    <label for="nom_profil">Nom d'utilisateur:</label><br>
    <input type="text" id="nom_profil" name="nom_profil"><br>
    <label for="email_profil">Email:</label><br>
    <input type="email_profil" id="email_profil" name="email_profil"><br>
    <label for="mdp_profil">Mot de passe:</label><br>
    <input type="password" id="mdp_profil" name="mdp_profil"><br>
    <input type="submit" value="S'inscrire">
  </form>
</body>

</html>