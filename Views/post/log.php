<?php if ($_SESSION['id_role'] == 3) { ?>

    <?php require_once 'Views\head.php'; ?>
    <?php require_once 'Views/navbar.php' ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Log</title>
    </head>

    <body style="background-color: black;" class="text-open-sans">

        <?php foreach ($logs as $log) { ?>

            <div class="d-flex justify-content-center mt-5">
                <div class="card" style="width: 50%;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $log->getNomProfil() ?> <?php echo $log->action ?></h5>
                    </div>
                </div>
            </div>

        <?php } ?>

    </body>

    <?php require_once 'Views/foot.php'; ?>

<?php } ?>