<?php require_once 'C:\xampp\htdocs\Projet-BonneFete\Views\head.php'; ?> <!-- ATTENTION CHANGE LES REQUIRE-->
<?php require_once 'C:\xampp\htdocs\Projet-BonneFete\Views\navbar.php'; ?> <!-- ATTENTION CHANGE LES REQUIRE-->

<body style="background-color: black;">
    <div class="container-fluid">
        <div class="row">
            <!-- container gauche -->
            <div class="col-lg-9">
                <div class="wrapper">
                    <div class="row flex-wrap">
                        <!-- Les faux post sont là pour mes test pour que je vois bien que ça s'affiche dans le cotnainer gauche-->
                        <!-- Faux post 1 -->
                        <div class="col-md-4">
                            <div class="card mt-3">
                                <div class="card-body">
                                    <p class="card-text">Ceci est le contenu du premier faux post</p>
                                </div>
                            </div>
                        </div>
                        <!-- Faux post 2 -->
                        <div class="col-md-4">
                            <div class="card mt-3">
                                <div class="card-body">
                                    <p class="card-text">Ceci est le contenu du deuxième faux post</p>
                                </div>
                            </div>
                        </div>
                        <!-- Faux post 3 -->
                        <div class="col-md-4">
                            <div class="card mt-3">
                                <div class="card-body">
                                    <p class="card-text">Ceci est le contenu du troisième faux post</p>
                                </div>
                            </div>
                        </div>
                        <!-- Vrai post enfin tu dois changer pour que ça fonctionne avec la bdd mais je peux pas vérifier si ça marche faudra surement réviser ou contacte moi-->

                        <?php foreach ($posts as $post) { ?>
                            <div class="col-md-4">
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <input type="hidden" name="idpost" value="<?php echo $post->getId() ?>">

                                        <p class="card-text">
                                            <?php echo $post->getNomProfil()  ?> a posté:
                                        </p>
                                        <p class="card-text1"><?php echo $post->description_post ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- container droit -->
            <div class="col-lg-3">
                <div class="input-group mt-3 mb-3">
                    <!-- Barre de recherche qui marche enfin là j'ai fais en sorte que ça cherche le pseudo mais tu peux modifié facilement pour que ça recherche le nom de l'utilisateur ATTENTION ça cherche dans les deux container -->
                    <input type="text" class="form-control" placeholder="Recherche pseudo" id="pseudoSearch">
                </div>
                <!-- Faux profil pour voir si ça 'affiche bien-->

                <?php foreach ($profils as $profil) { ?>

                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $profil->getNomProfil() ?></h5>
                            <input type="hidden" name="id_profil" value="<?php echo $profil->getId(); ?>">

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#profileModal<?php echo $profil->getId() ?>" data-id="<?php echo $profil->getId() ?>">
                                Profil
                            </button>
                            <button class="btn btn-secondary">Ajout-modo</button>
                        </div>
                    </div>
                <?php } ?>
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
                    <!-- Ajoutez ici les autres informations du profil que vous souhaitez afficher -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>


    </div>
    <!-- Je voulais mettre un modale lorsqu'on clique le bouton profil des cart dans le container droit bon là c'ets chat gpt qui m'a aidé mais vu que je peux pas test bah compliqué le bail-->
    <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">Profil de l'utilisateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- C'est ici que le contenue du profil sera ajouter pas js askip -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
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



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> <!-- JS -->
    <?php require_once 'recherche.php' ?>
</body>

<?php require_once 'C:\xampp\htdocs\Projet-BonneFete\Views\foot.php'; ?> <!-- ATTENTION CHANGE LES REQUIRE-->