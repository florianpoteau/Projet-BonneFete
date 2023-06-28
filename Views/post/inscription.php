<?php require_once 'C:\xampp\htdocs\Projet-BonneFete\Views\head.php';


?>

<title>Inscription</title>
</head>


<body class="bg-black">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card mt-5">
          <div class="card-body">
            <h2 class="card-title text-center">Inscription</h2>

            <form action="../profil/register" method="post">

              <div class="form-group">
                <label for="nom_profil">Nom d'utilisateur:</label>
                <input type="text" class="form-control" id="nom_profil" name="nom_profil" required>
              </div>

              <br>

              <div class="form-group">
                <label for="email_profil">Email:</label>
                <input type="email" class="form-control" id="email_profil" name="email_profil" required>
              </div>

              <br>

              <div class="form-group">
                <label for="mdp_profil">Mot de passe:</label>
                <input type="password" class="form-control" id="mdp_profil" name="mdp_profil" required>
              </div>

              <br>

              <div class="text-center">

                <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>

              </div>

            </form>

            <div class="text-center mt-3">
              <a href="../profil/login">Vous avez déjà un compte ?</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php require_once 'C:\xampp\htdocs\Projet-BonneFete\Views\foot.php' ?>
</body>

</html>