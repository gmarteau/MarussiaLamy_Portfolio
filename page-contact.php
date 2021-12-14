<?php get_header(); ?>

<?php while (have_posts()) : the_post() ?>
    <div class="row contact__title pb-5">
        <h1 class="col contact__title__text text-center px-0"><?= get_the_title(); ?></h1>
    </div>

    <div class="row contact__taglines py-5">
        <p class="col-6 ps-0 pe-4"><?= get_field('tagline_01'); ?></p>
        <p class="col-6 pe-0 ps-4"><?= get_field('tagline_02'); ?></p>
    </div>

    <div class="row contact__option">
        <a href="mailto:<?= get_option('admin_email') ?>" class="col-12 contact__option__link p-0 d-flex justify-content-between align-items-center">
            Email<span class="round-cta"><i class="fas fa-arrow-right"></i></span>
        </a>
    </div>

    <div class="row contact__social pt-5">
        <h2 class="col contact__social__title px-0">Réseaux sociaux</h2>
    </div>

    <ul class="row contact__social__list p-0">
        <?php
        $socials = wp_get_nav_menu_items('social-media');
        if ($socials) : foreach ($socials as $social) :
        ?>
        <li class="col-12 contact__option p-0">
            <a href="<?= $social->url; ?>" class="col-12 contact__option__link p-0 d-flex justify-content-between align-items-center">
                <?= $social->title; ?><span class="round-cta"><i class="fas fa-arrow-right"></i></span>
            </a>
        </li>
        <?php endforeach; endif; ?>
    </ul>
<?php endwhile; ?>

<?php get_footer(); ?>