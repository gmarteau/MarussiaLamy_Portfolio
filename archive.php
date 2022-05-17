<?php get_header(); ?>

<?php require_once('inc/archive-header-content.php'); ?>

<div id="archiveHero" class="row archive__hero py-3">
    <div class="col-12 archive__hero__title d-flex justify-content-center align-items-center px-0 mb-0 mb-lg-5">
        <h1><?= $title ?></h1>
    </div>

    <div class="col-12 archive__hero__links d-flex px-0">
        <div class="col-6 d-flex justify-content-start">
            <a class="archive__hero__links__link d-flex align-items-center" href="<?= get_term_link($firstDifferentSkill); ?>">
                <img class="arrow--nobg arrow--left me-1" src="<?= get_template_directory_uri() . '/assets/images/arrow-maru.svg'; ?>" alt="Flèche pointant vers la gauche" />
                <?= $firstDifferentSkill->name ?>
            </a>
        </div>
        <div class="col-6 d-flex justify-content-end">
            <a class="archive__hero__links__link d-flex align-items-center" href="<?= get_term_link($secondDifferentSkill); ?>">
                <?= $secondDifferentSkill->name ?>
                <img class="arrow--nobg ms-1" src="<?= get_template_directory_uri() . '/assets/images/arrow-maru.svg'; ?>" alt="Flèche pointant vers la droite" />
            </a>
        </div>
    </div>
</div>

<div class="row archive__grid">
    <?php if (have_posts()) : ?>
        <?php $i = 1; ?>
        <?php while (have_posts()) : the_post() ?>
            <?php $isOdd = ($i%2 !== 0) ? true : false; ?>
            <div id="archiveProject--<?= $i; ?>" class="col-12 archive__grid__project d-flex flex-wrap px-0">
                <div class="col-12 col-lg-6 archive__grid__project__thumbnail <?= $isOdd ? 'odd pe-lg-5' : 'ps-lg-5'; ?>">
                    <a href="<?= get_permalink(); ?>" class="d-block archive__grid__project__thumbnail__container">
                        <?php the_post_thumbnail('archive-thumbnail', ['class' => 'archive__grid__project__thumbnail__img']); ?>
                    </a>
                </div>
                <div class="col-12 col-lg-6 d-flex flex-column justify-content-center archive__grid__project__info mb-3 mb-lg-0 <?= $isOdd ? 'odd ps-lg-5' : 'pe-lg-5'; ?>">
                    <p class="archive__grid__project__info__client my-0 my-lg-2"><?= get_field('client'); ?></p>
                    <h2 class="archive__grid__project__info__title my-0 my-lg-2"><?= get_the_title(); ?></h2>
                    <a class="archive__grid__project__info__link my-2 d-flex align-items-center" href="<?= get_permalink(); ?>">
                        <img class="arrow arrow--small me-3" src="<?= get_template_directory_uri() . '/assets/images/arrow-maru.svg'; ?>" alt="Flèche pointant vers la droite" />
                        Voir le projet
                    </a>
                </div>
            </div>
            <?php $i++; ?>
        <?php endwhile; ?>
    <?php else : ?>
        <p>Rien à voir pour le moment...</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>