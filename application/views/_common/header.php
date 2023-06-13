<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $this->data['page_title'] . ' | ' . SITE_TITLE ?></title>
    <!-- styles -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800&family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="icon" href="<?= APP_URL ?>/public/images/logo.png" type="image/png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
    <link rel="stylesheet" href="<?= APP_URL ?>/public/css/font-awesome-all.css" />
    <link rel="stylesheet" href="<?= APP_URL ?>/public/css/main.css" />
    <link rel="stylesheet" href="<?= APP_URL ?>/public/css/style.css" />
    <link rel="stylesheet" href="<?= APP_URL ?>/public/css/custom.css" />

    <!-- scripts -->
    <?php
    $this->addScript("https://code.jquery.com/jquery-3.5.1.js", 1);
    $this->addScript("https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js", 2);
    $this->addScript(APP_URL . "/public/js/main.js", 10);
    ?>
    <script>
        const CODEMIRROR_PLUGIN_PATH = "<?= APP_URL ?>/public/codemirror/";
    </script>
</head>

<body class="<?= SKIN_COLOR ?> sidebar-closed">
    <div class="wrapper d-flex">


        <!-- main sidebar start-->
        <aside id="sidebar" class="sidebar hidden_sidebar fixed-top">
            <!-- sidebar logo -->
            <div class="logo position-relative">
                <a href="<?= APP_URL . '/account/onAuthenticate/' ?>" class="">
                    <img src="<?= APP_URL ?>/public/images/logo.png" class="img-fluid" alt="logo" width="40" height="40" />

                    <span class="ms-2 mt-2 fs-md-6"><?= SITE_NAME ?></span>
                </a>
            </div>

            <!-- menu navigation -->
            <?php require_once(VIEW_PATH . "_common/navigation.php"); ?>
            <!-- ./menu navigation end -->
        </aside>



        <!-- ./main sidebar end-->
        <div class="main-content">
            <!-- Header start -->
            <?php require_once(VIEW_PATH . "_common/panel_top.php"); ?>
            <!-- Header end -->