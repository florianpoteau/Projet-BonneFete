<?php require_once 'Views/head.php'; ?>
<title>Connexion</title>
</head>
<?php
if (isset($_SESSION['nom_profil'])) {
    $nom_profil = $_SESSION['nom_profil'];
}
?>

<body class="bg-black">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-body">
                        <h2 class="card-title text-center">Connexion</h2>



                        <form action="../profil/login" method="post">

                            <div class="form-group" style="display: none;">
                                <label for="id_profil">ID de profil:</label>
                                <input type="hidden" id="id_profil" name="id_profil" value="<?php echo isset($_SESSION['id_profil']) ? $_SESSION['id_profil'] : ''; ?>">

                            </div>

                            <div class="form-group">
                                <label for="nom_profil">Nom d'utilisateur:</label>
                                <input type="text" class="form-control" id="nom_profil" name="nom_profil" required>
                            </div>

                            <br>

                            <div class="form-group">
                                <label for="mdp_profil">Mot de passe:</label>
                                <input type="password" class="form-control" id="mdp_profil" name="mdp_profil" required>
                            </div>

                            <br>

                            <div class="text-center">

                                <button type="submit" class="btn btn-primary btn-block">Se connecter</button>

                            </div>

                        </form>

                        <div class="text-center mt-3">
                            <a href="../profil/index">Vous n'avez pas de compte ? Inscrivez-vous</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once 'Views/foot.php' ?>
</body>

</html>