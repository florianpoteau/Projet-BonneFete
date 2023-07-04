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
                                    <?php foreach ($infoComptes as $infoCompte) { ?>
                                        <h2 class="card-title mt-3"><?php echo $infoCompte->getNomProfil() ?></h2>


                                        <p>Username</p>
                                        <h5>Email</h5>


                                        <p><?php echo $infoCompte->getEmail() ?></p>
                                    <?php  } ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-body down">
                            <button type="button" class="btn btn-primary mt-5 mb-2" data-toggle="modal" data-target="#myModal<?php echo $_SESSION['id_profil'] ?>">
                                Modifier le compte
                            </button>
                            <a href="../profil/login"><button type="button" class="btn btn-danger mt-5 mb-2">Déconnexion</button></a>

                            <button type="button" class="btn btn-danger mt-5 mb-2" data-toggle="modal" data-target="#confirmModal">Supprimer le compte</button>



                            <!-- Modal pour supprimer le compte -->
                            <div class="modal" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmModalLabel">Confirmation de suppression</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Êtes-vous sûr de vouloir supprimer votre compte ?</p>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                            <form action="../profil/DeleteProfil" method="post">
                                                <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#confirmModal">Supprimer</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

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

        <!-- Modal pour modifier -->
        <div class="modal" id="myModal<?php echo $_SESSION['id_profil'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- En-tête de la modal -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modifier le compte</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Contenu de la modal -->
                    <div class="modal-body">
                        <form action="../profil/changeAccount" method="post">
                            <input type="hidden" name="id_profil" value="<?php echo $_SESSION['id_profil'] ?>">
                            <?php foreach ($infoComptes as $infoCompte) { ?>
                                <div class="form-group">
                                    <label for="nom_profil">Entrez votre nom d'utilisateur</label>
                                    <input type="text" class="form-control" id="nom_profil" name="nom_profil" value="<?php echo $infoCompte->getNomProfil() ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="mdp_profil">Entrez votre mot de passe</label>
                                    <input type="password" class="form-control" id="mdp_profil" name="mdp_profil" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="email_profil">Entrez votre email</label>
                                    <input type="text" class="form-control" id="email_profil" name="email_profil" value="<?php echo $infoCompte->getEmail() ?>" required>
                                </div>

                            <?php } ?>

                            <!-- Pied de la modal -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Historique des posts de l'utilisateur -->

    <?php foreach ($postUsers as $profil) { ?>



        <div class="container-fluid text-center">
            <div class="row flex-wrap justify-content-center">
                <div class="col-sm-8">
                    <div class="card mt-5">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $profil->getNomProfil() ?></h5>
                            <p class="card-text"><?php echo $profil->description_post ?></p>
                        </div>
                        <button type="button" class="btn btn-primary mx-auto" data-toggle="modal" data-target="#myModal<?php echo $profil->idpost ?>">
                            Modifier
                        </button>

                        <br>

                        <form action="../profil/deletePost" method="post" class="d-inline-block">

                            <input type="hidden" name="idpost" value="<?php echo $profil->idpost ?>">

                            <button type="submit" class="btn btn-danger">Supprimer</button>


                        </form>
                    </div>
                </div>




            </div>
        </div>

        <!-- Modal  pour le bouton modifier dans les posts-->
        <div class="modal" id="myModal<?php echo $profil->idpost ?>">

            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- En-tête de la modal -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modifier le post</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Contenu de la modal -->
                    <div class="modal-body">
                        <form action="../profil/change" method="post">
                            <div class="form-group">
                                <label for="description_post">Entrez votre texte</label>
                                <input type="text" class="form-control" id="description_post" name="description_post" value="<?php echo $profil->description_post ?>" required>
                                <input type="hidden" name="idpost" value="<?php echo $profil->idpost ?>">
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
    <?php } ?>
</body>

<?php require_once 'C:\xampp\htdocs\Projet-BonneFete\Views\foot.php'; ?>