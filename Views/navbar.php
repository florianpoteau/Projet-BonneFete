<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid position-relative">
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item" style="margin-left: 25%; margin-right: 25%; ">
                    <a class="nav-link active" aria-current="page" href="../profil/accueil">Accueil</a>
                </li>

                <?php if ($_SESSION['id_role'] == 1 || $_SESSION['id_role'] == 2 || $_SESSION['id_role'] == 3) { ?>
                    <li class="nav-item" style="margin-left: 25%; margin-right: 25%; ">
                        <a class="nav-link" aria-current="page" href="../profil/historique">Historique</a>
                    </li>
                <?php } ?>

                <?php if ($_SESSION['id_role'] == 3) { ?>
                    <li class="nav-item" style="margin-left: 25%; margin-right: 25%; ">
                        <a class="nav-link" aria-current="page" href="../profil/log">Log</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <div class="position-absolute top-0 d-lg-none">
            <a href="../profil/profil">
                <button type="button" class="btn btn-primary">
                    Profil
                </button>
            </a>
        </div>
        <div class="d-lg-inline-block">
            <a href="../profil/profil" class="d-none d-lg-inline">
                <button type="button" class="btn btn-primary">
                    Profil
                </button>
            </a>
        </div>

    </div>
</nav>