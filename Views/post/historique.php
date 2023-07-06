<?php if ($_SESSION['id_role'] == 3 || $_SESSION['id_role'] == 2) { ?>

    <?php require_once 'Views/head.php'; ?> <!-- ATTENTION CHANGE LES REQUIRE-->
    <!-- Inclure jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>Historique</title>
    </head>
    <?php require_once 'Views/navbar.php'; ?> <!-- ATTENTION CHANGE LES REQUIRE-->

    <body style="background-color: black;" class="text-open-sans">
        <div class="container-fluid">
            <div class="row">
                <!-- container gauche -->
                <div class="col-lg-9 order-1">
                    <div class="wrapper">
                        <div id="card-container-left" class="row flex-wrap">
                            <?php foreach ($posts as $post) { ?>
                                <div class="col-md-4">
                                    <div class="card mt-3">
                                        <div class="card-body">
                                            <input type="hidden" name="idpost" value="<?php echo $post->getId() ?>">

                                            <p class="card-title">
                                                <?php echo $post->getNomProfil()  ?> a posté:
                                            </p>
                                            <p class="card-text"><?php echo $post->description_post ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <!-- container droit -->
                <div class="col-lg-3 order-lg-2">
                    <div class="input-group mt-3 mb-3 order-lg-1">
                        <!-- Barre de recherche qui marche enfin là j'ai fais en sorte que ça cherche le pseudo mais tu peux modifié facilement pour que ça recherche le nom de l'utilisateur ATTENTION ça cherche dans les deux container -->
                        <input type="text" class="form-control" placeholder="Recherche pseudo" id="pseudoSearch">
                    </div>
                    <!-- profil pour voir si ça 'affiche bien-->

                    <?php foreach ($profils as $profil) { ?>
                        <div class="card mt-3 mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $profil->getNomProfil() ?></h5>
                                <input type="hidden" name="id_profil" value="<?php echo $profil->getId(); ?>">


                                <!-- Modal bouton Profil -->
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
                                                <p>Nom : <?php echo $profil->getNomProfil() ?></p>
                                                <p>Email : <?php echo $profil->getEmail() ?></p>
                                                <p>Role: <?php echo $profil->libelle_role ?></p>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#profileModal<?php echo $profil->getId() ?>">
                                    Profil
                                </button>


                                <!-- Bouton Ajout modo -->
                                <?php if ($profil->getRole() == 1) { ?>

                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#addModoModal<?php echo $profil->getId() ?>">Ajout-modo</button>

                                    <br>
                                    <br>
                                    <!-- Modal Ajout Modo -->
                                    <div class="modal fade" id="addModoModal<?php echo $profil->getId() ?>" tabindex="-1" role="dialog" aria-labelledby="addModoModalLabel<?php echo $profil->getId() ?>" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addModoModalLabel<?php echo $profil->getId() ?>">Ajouter un modérateur pour <?php echo $profil->getNomProfil() ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">



                                                    <div class="form-group">
                                                        <p>Etes-vous sur de vouloir ajouter <?php echo $profil->getNomProfil() ?> En tant que modérateur?</label> </p>

                                                    </div>

                                                    <!-- Ajoutez d'autres champs pour le formulaire d'ajout de modérateur ici -->
                                                    <input type="hidden" name="profilId" value="<?php echo $profil->getId() ?>">
                                                    <div class="modal-footer">

                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                        <form action="../profil/historiquemoderateur" method="post">
                                                            <input type="hidden" name="id_profil" value="<?php echo $profil->getId(); ?>">
                                                            <input type="hidden" name="nom_profil" value="<?php echo $profil->getNomProfil(); ?>">

                                                            <button type="submit" class="btn btn-primary">Ajouter</button>
                                                        </form>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                <?php } ?>

                                <!-- Super admin -->

                                <?php if ($_SESSION['id_role'] == 3 || ($_SESSION['id_role'] == 2 && ($profil->getRole() == 1))) { ?>

                                    <?php if ($profil->getRole() == 2) { ?>

                                        <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#retrogradeModal<?php echo $profil->getId() ?>">
                                            Rétrograder
                                        </button>

                                        <!-- Modal Rétrograder -->
                                        <div class="modal fade" id="retrogradeModal<?php echo $profil->getId() ?>" tabindex="-1" role="dialog" aria-labelledby="retrogradeModalLabel<?php echo $profil->getId() ?>" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="retrogradeModalLabel<?php echo $profil->getId() ?>">Rétrograder <?php echo $profil->getNomProfil() ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Êtes-vous sûr de vouloir rétrograder <?php echo $profil->getNomProfil() ?> au role de visiteur?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                        <form action="../profil/retrograder" method="post">
                                                            <input type="hidden" name="id_profil" value="<?php echo $profil->getId(); ?>">
                                                            <input type="hidden" name="nom_profil" value="<?php echo $profil->getNomProfil(); ?>">

                                                            <button type="submit" class="btn btn-danger">Rétrograder</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                    <?php } ?>

                                    <?php if ($profil->getRole() == 1 || $profil->getRole() == 2) { ?>

                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $profil->getId() ?>">
                                            Supprimer le compte
                                        </button>

                                        <br>
                                        <br>

                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal<?php echo $profil->getId() ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalLabel">Titre du Modal</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="../profil/deleteProfilWithAdmin" method="post">
                                                        <div class="modal-body">
                                                            <p>Etes-vous sûr de vouloir supprimer le compte de <?php echo $profil->getNomProfil() ?></p>
                                                            <input type="hidden" name="id_profil" value="<?php echo $profil->getId(); ?>">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                            <button type="submit" class="btn btn-primary">Supprimer</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>




                                <?php } ?>

                            </div>
                        </div>
                    <?php } ?>


                </div>
            </div>
        </div>

        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
        <?php require_once 'recherche.php' ?>

        <?php require_once 'Views\foot.php'; ?>

    <?php } ?>