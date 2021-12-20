<?php get_header(); ?>

<?php while (have_posts()) : the_post() ?>
    <div class="row contact__title py-5 pt-lg-0 pb-lg-5">
        <h1 class="col contact__title__text text-center px-0"><?= get_the_title(); ?></h1>
    </div>

    <div class="row contact__taglines py-3 py-lg-5">
        <p class="col-12 col-lg-6 px-0 ps-lg-0 pe-lg-4"><?= get_field('tagline_01'); ?></p>
        <p class="col-12 col-lg-6 px-0 pe-lg-0 ps-lg-4"><?= get_field('tagline_02'); ?></p>
    </div>

    <div id="contactEmail" class="row contact__option">
        <a href="mailto:<?= get_option('admin_email') ?>" class="col-12 contact__option__link custom-cursor p-0 d-flex justify-content-between align-items-center">
            Email
            <img class="arrow arrow--right" src="<?= get_template_directory_uri() . '/assets/images/arrow.svg'; ?>" alt="Flèche pointant vers la droite" />
        </a>
    </div>

    <div class="row contact__social pt-5">
        <h2 class="col contact__social__title px-0">Réseaux sociaux</h2>
    </div>

    <ul class="row contact__social__list p-0">
        <?php
        $socials = wp_get_nav_menu_items('social-media');
        $i = 1;
        if ($socials) : foreach ($socials as $social) :
        ?>
        <li id="contactSocial--<?= $i; ?>" class="col-12 contact__option p-0">
            <a href="<?= $social->url; ?>" class="col-12 contact__option__link custom-cursor p-0 d-flex justify-content-between align-items-center">
                <?= $social->title; ?>
                <img class="arrow arrow--right" src="<?= get_template_directory_uri() . '/assets/images/arrow.svg'; ?>" alt="Flèche pointant vers la droite" />
            </a>
        </li>
        <?php $i++; ?>
        <?php endforeach; endif; ?>
    </ul>
<?php endwhile; ?>

<?php get_footer(); ?>