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
                                <input type="text" class="form-control" id="description_post" name="description_post" required>
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

    <?php foreach ($profils as $profil) { ?>

        <div class="card text-center mx-auto mt-5" style="width: 18rem;">
            <div class="card-body">
                <p class="card-text"><?php echo $profil->getNomProfil() ?>
                </p>

                <p class="card-text"><?php echo $profil->description_post ?></p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $profil->idpost ?>">
                    Modifier
                </button>

                <form action="../profil/delete" method="post">

                    <input type="hidden" name="idpost" value="<?php echo $profil->idpost ?>">

                    <button type="submit" class="btn btn-danger">Supprimer</button>

                </form>

            </div>
        </div>
        <!-- Modal -->
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

<?php require_once 'C:\xampp\htdocs\Projet-BonneFete\Views\foot.php' ?>