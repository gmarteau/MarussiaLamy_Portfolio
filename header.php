<!DOCTYPE html>
<html lang="fr-fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body>
    <div class="main-wrapper container-fluid">
        <header>
            <nav class="navbar navbar-expand-lg bg-transparent">
                <div class="container-fluid">
                    <a class="navbar-brand navbar__brand" href="<?= get_home_url(); ?>">maru</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav ms-auto">
                            <?php
                            $menuItems = wp_get_nav_menu_items('header');
                            if ($menuItems) :
                            foreach ($menuItems as $menuItem) :
                                $isActivePage = $menuItem->url === get_permalink() ? true : false;
                            ?>
                                <a class="nav-link navbar__link <?= $isActivePage ? 'active' : ''; ?>" <?= $isActivePage ? 'aria-current="page"' : ''; ?>  href="<?= $menuItem->url; ?>"><?= $menuItem->title; ?></a>
                            <?php endforeach; endif; ?>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <main>