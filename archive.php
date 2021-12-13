<?php get_header(); ?>

<?php require_once('inc/archive-header-content.php'); ?>

<div class="row archive__hero py-3">
    <div class="col-12 archive__hero__title d-flex justify-content-center align-items-center">
        <h1><?= $title ?></h1>
    </div>

    <div class="col-12 archive__hero__links d-flex">
        <div class="col-6 d-flex justify-content-start">
            <a class="archive__hero__links__link d-flex align-items-center" href="<?= get_term_link($firstDifferentSkill); ?>">
                <i class="fas fa-arrow-left fa-lg me-2"></i><?= $firstDifferentSkill->name ?>
            </a>
        </div>
        <div class="col-6 d-flex justify-content-end">
            <a class="archive__hero__links__link d-flex align-items-center" href="<?= get_term_link($secondDifferentSkill); ?>">
                <?= $secondDifferentSkill->name ?><i class="fas fa-arrow-right fa-lg ms-2"></i>
            </a>
        </div>
    </div>
</div>

<div class="row archive__grid">
    <?php if (have_posts()) : ?>
        <?php $i = 1; ?>
        <?php while (have_posts()) : the_post() ?>
            <?php $isOdd = ($i%2 !== 0) ? true : false; ?>
            <div class="col-12 archive__grid__project d-flex">
                <div class="col-6 archive__grid__project__thumbnail <?= $isOdd ? 'odd pe-5' : 'ps-5'; ?>">
                    <?php the_post_thumbnail('archive-thumbnail', ['class' => 'archive__grid__project__thumbnail__img']); ?>
                </div>
                <div class="col-6 d-flex flex-column justify-content-center archive__grid__project__info <?= $isOdd ? 'odd ps-5' : 'pe-5'; ?>">
                    <p class="archive__grid__project__info__client my-2"><?= get_field('client'); ?></p>
                    <h2 class="archive__grid__project__info__title my-2"><?= get_the_title(); ?></h2>
                    <a class="archive__grid__project__info__link my-2 d-flex align-items-center" href="<?= get_permalink(); ?>">
                        <i class="fas fa-arrow-right fa-2x me-3"></i>Voir le projet
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