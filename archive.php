<?php get_header(); ?>

<?php require_once('inc/archive-header-content.php'); ?>

<div class="row archive__hero py-3">
    <div class="col-12 archive__hero__title d-flex justify-content-center align-items-center">
        <h1><?= $title ?></h1>
    </div>

    <div class="col-12 archive__hero__links d-flex">
        <div class="col-6 text-start">
            <a class="archive__hero__links__link" href="<?= get_term_link($firstDifferentSkill); ?>">
                <?= $firstDifferentSkill->name ?>
            </a>
        </div>
        <div class="col-6 text-end">
            <a class="archive__hero__links__link" href="<?= get_term_link($secondDifferentSkill); ?>">
                <?= $secondDifferentSkill->name ?>
            </a>
        </div>
    </div>
</div>

<div class="row archive__grid py-5">
    <?php if (have_posts()) : ?>
        <?php $i = 1; ?>
        <?php while (have_posts()) : the_post() ?>
            <?php $isOdd = ($i%2 !== 0) ? true : false; ?>
            <div class="col-12 archive__grid__project d-flex">
                <div class="col-6 archive__grid__project__thumbnail <?= $isOdd ? 'odd pe-4' : 'ps-4'; ?>">
                    <?php the_post_thumbnail('medium', ['class' => 'archive__grid__project__thumbnail__img']); ?>
                </div>
                <div class="col-6 d-flex flex-column justify-content-center archive__grid__project__info <?= $isOdd ? 'odd ps-4' : 'pe-4'; ?>">
                    <p><?= get_field('client'); ?></p>
                    <h2><?= get_the_title(); ?></h2>
                    <a href="<?= get_permalink(); ?>" class="d-block">Voir le projet</a>
                </div>
            </div>
            <?php $i++; ?>
        <?php endwhile; ?>
    <?php else : ?>
        <p>Rien à voir pour le moment...</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>