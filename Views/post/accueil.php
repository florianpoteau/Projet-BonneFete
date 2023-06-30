<?php require_once 'C:\xampp\htdocs\Projet-BonneFete\Views\head.php' ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<title>Accueil</title>
</head>

<body style="background-color: black;">

    <?php require_once 'C:\xampp\htdocs\Projet-BonneFete\Views\navbar.php' ?>

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-body">
                        <h2 class="card-title text-center">Ajouter un post</h2>

                        <form action="../profil/accueil" method="post">


                            <br>

                            <div class="form-group">
                                <label for="description_post">Entrez votre texte</label>
                                <input type="text" class="form-control" id="description_post" name="description_post" maxlength="200" required>

                            </div>

                            <br>



                            <div class="text-center">

                                <button type="submit" class="btn btn-primary btn-block">Ajouter</button>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card bootstrap pour la liste des posts -->

    <div class="d-flex flex-wrap">
        <?php foreach ($profils as $profil) { ?>

            <div class="card text-center mx-auto mt-5" style="width: 50rem;">
                <div class="card-body">

                    <?php if ($profil->getId() == $_SESSION['id_profil']) { ?>
                        <p class="card-text">Vous avez posté :</p>
                    <?php } else { ?>

                        <p class="card-text"><?php echo $profil->getNomProfil()  ?> a posté:
                        </p>

                    <?php } ?>

                    <p class="card-text"><?php echo $profil->description_post ?></p>

                    <?php if ($_SESSION['id_role'] == 2 || $_SESSION['id_profil'] == $profil->getId()) { ?>

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $profil->idpost ?>">
                            Modifier
                        </button>

                        <form action="../profil/delete" method="post" class="d-inline-block">

                            <input type="hidden" name="idpost" value="<?php echo $profil->idpost ?>">

                            <button type="submit" class="btn btn-danger">Supprimer</button>

                            <!-- Bouton "Voir profil" -->
                            <a href="lien_vers_profil.php?id=<?php echo $profil->getId() ?>" class="btn btn-secondary" data-toggle="modal" data-target="#profileModal<?php echo $profil->getId() ?>">Voir profil</a>


                        </form>

                        <p class="card-text text-right"><?php echo "Posté le " . $profil->date_post ?></p>

                    <?php } ?>







                </div>
            </div>
    </div>


    <!-- Modal du bouton modifier -->
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

    <!-- Modal du bouton voir profil -->
    <div class="modal fade" id="profileModal<?php echo $profil->getId() ?>" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel<?php echo $profil->getId() ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel<?php echo $profil->getId() ?>">Profil de <?php echo $profil->getNomProfil() ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Contenu du modal avec les détails du profil -->
                    <p>Nom : <?php echo $profil->getNomProfil() ?></p>
                    <p>Email : <?php echo $profil->getEmail() ?></p>

                    <h4>Posts de l'utilisateur</h4>







                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


<?php } ?>



</body>

<?php require_once 'C:\xampp\htdocs\Projet-BonneFete\Views\foot.php' ?>