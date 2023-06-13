<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?= $this->data['page_title'] . ' | ' . SITE_TITLE ?></title>
    <!-- styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com"/>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&display=swap"
          rel="stylesheet"/>
    <link rel="icon" href="<?= APP_URL ?>/public/images/logo.png" type="image/png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link rel="stylesheet" href="<?= APP_URL ?>/public/css/main.css"/>
    <link rel="stylesheet" href="<?= APP_URL ?>/public/css/style.css"/>
</head>

<body class="<?= SKIN_COLOR ?>">
<div class="wrapper d-flex has-horizontal-menu">


    <!-- ./main sidebar end-->
    <div class="main-content">
        <!-- Header start -->
		<?php require_once( VIEW_PATH . "_common/panel_top2.php" ); ?>
        <!-- Header end -->

        <!-- menu navigation -->
		<?php require_once( VIEW_PATH . "_common/navigation2.php" ); ?>
        <!-- ./menu navigation end -->