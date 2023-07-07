<?php require_once 'Views/head.php';


?>

<title>Inscription</title>
</head>


<body class="bg-black text-open-sans">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card mt-5">
          <div class="card-body">
            <h2 class="card-title text-center text-Montserrat">Inscription</h2>

            <form action="../profil/register" method="post">

              <div class="form-group">
                <label for="nom_profil">Nom d'utilisateur:</label>
                <input type="text" class="form-control" id="nom_profil" name="nom_profil" minlength="3" required>
              </div>

              <br>

              <div class="form-group">
                <label for="email_profil">Email:</label>
                <input type="email" class="form-control" id="email_profil" name="email_profil" required>
              </div>

              <br>

              <div class="form-group">
                <label for="mdp_profil">Mot de passe:</label>
                <input type="password" class="form-control" id="mdp_profil" name="mdp_profil" minlength="8" required>
              </div>

              <br>

              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="accepter_conditions" name="accepter_conditions" required>
                  <label class="form-check-label" for="accepter_conditions">J'accepte les conditions d'utilisation</label>
                </div>
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


</body>

</html>