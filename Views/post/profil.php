<?php require_once 'C:\xampp\htdocs\Projet-BonneFete\Views\navbar.php'; ?>
<?php require_once 'C:\xampp\htdocs\Projet-BonneFete\Views\head.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<title>Profil</title>
</head>


<body style="background-color: black;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-body text-center">
                        <div class="row align-items-start">
                            <div class="col-md-6">
                                <div class="left">
                                    <img src="" class="rounded-circle mx-auto d-block" alt="Profil" style="width: 50%;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="right">
                                    <h2 class="card-title mt-3"><?php echo $_SESSION['nom_profil'] ?></h2>
                                    <p>username</p>
                                    <h5>Email</h5>
                                    <p><?php echo $_SESSION['email_profil'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body down">
                            <button type="button" class="btn btn-primary mt-3 mb-2" data-toggle="modal" data-target="#myModal<?php echo $_SESSION['id_profil'] ?>">
                                Changer le mot de passe
                            </button>
                            <button type="button" class="btn btn-danger mt-3 mb-2">Déconnexion</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal" id="myModal<?php echo $_SESSION['id_profil'] ?>">

            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- En-tête de la modal -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modifier le mot de passe</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Contenu de la modal -->
                    <div class="modal-body">
                        <form action="../profil/change" method="post">
                            <div class="form-group">
                                <label for="mdp_profil">Entrez votre texte</label>
                                <input type="text" class="form-control" id="mdp_profil" name="mdp_profil" value="<?php echo $_SESSION['mdp_profil'] ?>" required>
                                <input type="hidden" name="idpost" value="<?php echo $_SESSION['id_profil'] ?>">
                            </div>

                    </div>
                    <!-- Pied de la modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>


                        <button type="submit" class="btn btn-primary">Enregistrer</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>


        <!-- Historique des posts des utilisateurs -->
        <div class="container-fluid">
            <div class="row flex-wrap">
                <div class="col-sm-4">
                    <div class="card mt-5">
                        <div class="card-body">
                            <h5 class="card-title">Div 1</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card mt-5">
                        <div class="card-body">
                            <h5 class="card-title">Div 2</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card mt-5">
                        <div class="card-body">
                            <h5 class="card-title">Div 3</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card mt-5">
                        <div class="card-body">
                            <h5 class="card-title">Div 4</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        </div>
                    </div>
                </div>

            </div>

</body>

<?php require_once 'C:\xampp\htdocs\Projet-BonneFete\Views\foot.php'; ?>