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



                        <form action="../profil/login" method="post">



                            <br>

                            <div class="form-group">
                                <label for="i">Entrez votre texte</label>
                                <input type="text" class="form-control" id="i" name="i" required>
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

</body>

<?php require_once 'C:\xampp\htdocs\Projet-BonneFete\Views\foot.php' ?>