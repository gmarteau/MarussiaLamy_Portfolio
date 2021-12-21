<!DOCTYPE html>
<html lang="fr-fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body>
    <div class="main-wrapper container-fluid" id="swup">
        <div class="banner-transition p-0 m-0 transition-swipe
            <?= is_page('contact') ? 'contact' : ''; ?>
            <?= is_page('about') ? 'about' : ''; ?>
            <?= is_post_type_archive('project') ? 'archive' : ''; ?>
            <?= is_singular('project') ? 'single-project' : ''; ?>
        ">
            <div class="banner-transition__logo d-flex justify-content-center align-items-center transition-swipe">maru</div>
        </div>

        <header class="
            <?= is_page('contact') ? 'contact' : ''; ?>
            <?= is_page('about') ? 'about' : ''; ?>
            <?= is_archive() ? 'archive' : ''; ?>
            <?= is_singular('project') ? 'single-project' : ''; ?>
        ">
            <nav class="navbar fixed-top navbar-expand-lg bg-transparent">
                <div class="container-fluid px-0">
                    <a class="navbar-brand navbar__brand" href="<?= get_home_url(); ?>">maru</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ms-auto d-flex align-items-end pt-3 pt-lg-0">
                            <?php
                            $menuItems = wp_get_nav_menu_items('header');
                            if ($menuItems) :
                            foreach ($menuItems as $menuItem) :
                                $isActivePage = $menuItem->url === get_permalink() ? true : false;
                            ?>
                                <a class="nav-link ms-4 my-2 px-2 me-3 me-lg-0 px-lg-0 my-lg-0 navbar__link <?= $isActivePage ? 'active' : ''; ?>" <?= $isActivePage ? 'aria-current="page"' : ''; ?>  href="<?= $menuItem->url; ?>"><?= $menuItem->title; ?></a>
                            <?php endforeach; endif; ?>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <main id="page-top" class="container-fluid mt-0 pt-5
            <?= is_page('contact') ? 'contact' : ''; ?>
            <?= is_page('about') ? 'about' : ''; ?>
            <?= is_archive() ? 'archive' : ''; ?>
            <?= is_singular('project') ? 'single-project' : ''; ?>
        ">