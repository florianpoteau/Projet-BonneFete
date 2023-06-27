<?php
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$servername = 'localhost';
$dbname = 'bonnefete';
$username = 'ad_bonneFete!';
$password = 'B0neU_F&tee?!';


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Erreur de connexion: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    $sql = "INSERT INTO profil (nom_profil, email_profil, mdp_profil)
    VALUES ('$nom', '$email', '$mdp')";

    if ($conn->query($sql) === TRUE) {
      echo "Inscription réussie!";
    } else {
      echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page d'Inscription</title>
</head>
<body>
    <h2>Inscription</h2>
    <form method="post" action="">
        <label for="nom">Nom d'utilisateur:</label><br>
        <input type="text" id="nom" name="nom"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="pwd">Mot de passe:</label><br>
        <input type="password" id="pwd" name="pwd"><br>
        <input type="submit" value="S'inscrire">
    </form>
</body>
</html>


