<?php require_once 'C:\xampp\htdocs\Projet-BonneFete\Views\head.php' ?>


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
                <p class="card-text"><?php echo $profil->getDescription() ?></p>
            </div>
        </div>

    <?php } ?>



</body>

<?php require_once 'C:\xampp\htdocs\Projet-BonneFete\Views\foot.php' ?>