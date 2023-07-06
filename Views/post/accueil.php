<?php if ($_SESSION['id_role'] == 3 || $_SESSION['id_role'] == 2 || $_SESSION['id_role'] == 1) { ?>

    <?php require_once 'Views/head.php' ?>

    <title>Accueil</title>
    </head>

    <body class=" text-open-sans" style="background-color: black;">

        <?php require_once 'Views/navbar.php' ?>

        <div class="container mx-auto">

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mt-5">
                        <div class="card-body">
                            <h2 class="card-title text-center text-Montserrat">Ajouter un post</h2>

                            <form action="../profil/accueil" method="post" enctype="multipart/form-data">


                                <br>

                                <div class="form-group">
                                    <label for="description_post">Entrez votre texte</label>
                                    <input type="text" class="form-control" id="description_post" name="description_post" maxlength="200" required>

                                </div>

                                <br>
                                <div class="form-group">


                                    <label for="file">Ajouter une image</label>
                                    <input type="file" class="form-control-file" id="file" name="file">
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

        <div class="d-flex flex-wrap w-lg-50">
            <?php foreach ($profils as $profil) { ?>

                <div class="card text-center mx-auto mt-5 col-8">
                    <div class=" card-body">

                        <?php if ($profil->getId() == $_SESSION['id_profil']) { ?>
                            <p class="card-text">Vous avez posté :</p>
                        <?php } else { ?>

                            <p class="card-text"><?php echo $profil->getNomProfil()  ?> a posté:
                            </p>

                        <?php } ?>

                        <?php foreach ($images as $image) {
                            if ($image['idpost'] == $profil->idpost) {
                                echo "<img src='../Views/post/imagesPost/" . $image['name'] . "' width='100px' alt='rien'><br>";
                            }
                        } ?>

                        <br>

                        <p class="card-text"><?php echo $profil->description_post ?></p>

                        <br>

                        <?php if ($_SESSION['id_role'] == 2 || $_SESSION['id_role'] == 3 || $_SESSION['id_profil'] == $profil->getId()) { ?>



                            <button type="button" class="btn btn-primary" style="margin-right: 1%;" data-toggle="modal" data-target="#myModal<?php echo $profil->idpost ?>">
                                Modifier
                            </button>

                            <!-- Bouton supprimer pour les posts -->

                            <form action="../profil/delete" method="post" class="d-inline-block">

                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                <input type="hidden" name="idpost" value="<?php echo $profil->idpost ?>">


                            </form>

                        <?php } ?>
                        <br class="d-sm-none">
                        <br class="d-sm-none">

                        <!-- Bouton "Voir profil" -->
                        <button type="button" class="btn btn-warning" style="margin-right: 1%;margin-left: 1%;" data-toggle="modal" data-target="#profileModal<?php echo $profil->getId() ?>" data-id="<?php echo $profil->getId() ?>">
                            Voir profil
                        </button>

                        <button type="button" class="btn btn-success" data-toggle="collapse" data-target="#commentCollapse<?php echo $profil->idpost ?>">
                            Commenter
                        </button>


                        <img src="" alt="">
                        <br>
                        <br>

                        <?php
                        // Vérifier si l'utilisateur a déjà liké ce post
                        $hasLiked = $this->profilModel->hasLikedPost(['idpost' => $profil->idpost, 'id_profil' => $_SESSION['id_profil']]); ?>




                        <?php $likes = $this->profilModel->LikeByPost(['idpost' => $profil->idpost]); ?>

                        <?php // Afficher le bouton de like en fonction de la présence ou de l'absence du like
                        if ($hasLiked) {
                            // L'utilisateur a déjà liké ce post
                            echo '
              <i id="heart" class="fas fa-heart" style= "color: #ff0000"; "display: none;"></i>';
                        } else { ?>
                            <form action="../profil/addLike" method="post" class="formLike">


                                <input type="hidden" name="idpost" value="<?php echo $profil->idpost ?>">
                                <input type="hidden" name="id_profil" value="<?php echo $_SESSION['id_profil'] ?>">

                                <button type="submit" class="btn btn-secondary like-button" style="visibility: hidden;" data-post-id="<?php echo $profil->idpost ?>">
                                    <i id="heart" class="fas fa-heart" style="visibility: visible; color: black;"> </i>
                                </button>
                                <br>
                                <br>


                                <span id="likeText">

                                </span>



                                <script>
                                    var heart = document.getElementById("heart");
                                    var likeText = document.getElementById("likeText");

                                    heart.addEventListener("click", function() {
                                        if (heart.style.color === "rgb(255, 0, 0)") {
                                            heart.style.color = "";
                                            likeText.innerHTML = "";
                                        } else {
                                            heart.style.color = "#ff0000";
                                            likeText.innerHTML = "<p>Vous avez liké</p>";
                                        }
                                    });
                                </script>
                            </form>
                        <?php }
                        ?>


                        <p><?php echo $likes ?> personnes ont liké ceci</p>



                        <br>

                        <!-- Sous commentaire -->
                        <p class="card-text text-right"><?php echo "Posté le " . $profil->date_post ?></p>

                        <p>
                            <?php foreach ($commentaires as $comment) {
                                if ($comment->getIdPost() == $profil->idpost) { ?>
                                    <hr>
                                    <?php
                                    echo $comment->nom_profil . " a répondu"; ?>
                                    <br>
                                    <br>
                                    <?php
                                    echo $comment->getCommentaire();
                                    ?>
                                    <br>
                                <?php
                                    echo "Posté le " . $comment->getDateCommentaire();
                                } ?>

                            <?php } ?>
                            <hr>
                        </p>


                        <!-- Contenu pour l'extension de la card lors du clic sur le bouton commenter -->
                        <div id="commentCollapse<?php echo $profil->idpost ?>" class="collapse">
                            <!-- Contenu du commentaire -->
                            <form action="../profil/commentaire" method="post">
                                <input type="hidden" name="idpost" value="<?php echo $profil->idpost ?>">
                                <div class="form-group">
                                    <label for="commentaire">Votre commentaire</label>
                                    <br>
                                    <input type="text" class="form-control" id="commentaire" name="commentaire" required>
                                    <br>
                                </div>
                                <button type="submit" class="btn btn-primary">Ajouter le commentaire</button>
                            </form>
                        </div>






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
                                <input type="hidden" name="id_profil" value="<?php echo $profil->getId() ?>">
                                <input type="text" class="form-control" id="description_post" name="description_post" value="<?php echo $profil->description_post ?>" maxlength="200" required>
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

    <?php require_once 'Views/foot.php' ?>

<?php } ?>