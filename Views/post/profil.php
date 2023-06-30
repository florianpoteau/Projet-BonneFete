<?php require_once 'C:\xampp\htdocs\Projet-BonneFete\Views\navbar.php'; ?>
<?php require_once 'C:\xampp\htdocs\Projet-BonneFete\Views\head.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<title>Profil</title>
</head>


<body style="background-color: black;">

    <h2 class="text-center text-white mt-5">Mon profil</h2>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-body text-center">
                        <div class="row align-items-start">
                            <div class="col-md-6">
                                <div class="left">
                                    <img src="./Images/image.png" class="rounded-circle mx-auto d-block" alt="Profil" style="width: 50%;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="right">
                                    <h2 class="card-title mt-3"><?php echo $_SESSION['nom_profil'] ?></h2>
                                    <p>Username</p>
                                    <h5>Email</h5>
                                    <p><?php echo $_SESSION['email_profil'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body down">
                            <button type="button" class="btn btn-primary mt-5 mb-2" data-toggle="modal" data-target="#myModal<?php echo $_SESSION['id_profil'] ?>">
                                Changer le mot de passe
                            </button>
                            <a href="../profil/login"><button type="button" class="btn btn-danger mt-5 mb-2">Déconnexion</button></a>
                            <a href="../profil/index"><button type="submit" class="btn btn-danger mt-5 mb-2">Supprimer le compte</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <?php if (!empty($postUsers)) { ?>
            <h2 class="text-center text-white">Mes Posts</h2>

        <?php } ?>

        <?php if (empty($postUsers)) { ?>
            <div class="container text-center mt-5">
                <p class="text-center text-white mt-0">Ohhh non... Vous n'avez pas encore de post.</p>
                <p class="text-center text-white">Vous pourrez voir vos posts ici si vous avez des posts alors à vos claviers !!</p>
            </div>
        <?php } ?>

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
                        <form action="../profil/ChangePassword" method="post">
                            <div class="form-group">
                                <label for="mdp_profil">Entrez votre nouveau mot de passe</label>
                                <input type="text" class="form-control" id="mdp_profil" name="mdp_profil" value="<?php echo $_SESSION['mdp_profil'] ?>" required>
                                <input type="hidden" name="id_profil" value="<?php echo $_SESSION['id_profil'] ?>">
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

        <?php foreach ($postUsers as $postUser) { ?>



            <div class="container-fluid text-center">
                <div class="row flex-wrap justify-content-center">
                    <div class="col-sm-8">
                        <div class="card mt-5">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $postUser->getNomProfil() ?></h5>
                                <p class="card-text"><?php echo $postUser->description_post ?></p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        <?php } ?>
</body>

<?php require_once 'C:\xampp\htdocs\Projet-BonneFete\Views\foot.php'; ?>