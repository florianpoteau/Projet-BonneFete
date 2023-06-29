<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item" style="margin-left: 25%; margin-right: 25%; ">
                    <a class="nav-link active" aria-current="page" href="../profil/accueil">Accueil</a>
                </li>

                <?php if ($_SESSION['id_role'] == 2) { ?>
                    <li class="nav-item" style="margin-left: 25%; margin-right: 25%; ">
                        <a class="nav-link" href="#">Historique</a>
                    </li>
                <?php } ?>
            </ul>
            <a href="../profil/profil"><button type="button" class="btn btn-primary me-3">
                    Profil
                </button></a>
        </div>
    </div>
</nav>