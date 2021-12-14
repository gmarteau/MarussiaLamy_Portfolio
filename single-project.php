<?php get_header(); ?>

<?php while (have_posts()) : the_post() ?>
    <div class="row project__hero py-5">
        <h1 class="col-12 project__hero__title my-5 text-center px-0"><?= get_the_title(); ?></h1>
        <div class="col-12 project__hero__thumbnail px-0">
            <?php the_post_thumbnail('large', ['class' => 'project__hero__thumbnail__img']); ?>
        </div>
    </div>

    <div class="row project__info py-5 mt-5">
        <p class="col-12 project__info__client px-0"><?= get_field('client'); ?></p>
        <h2 class="col-12 project__info__subtitle px-0"><?= get_field('subtitle'); ?></h2>
    </div>

    <div class="row project__details py-5 d-flex flex-column align-items-end">
        <p class="col-12 project__details__description px-0"><?= get_field('description'); ?></p>
        <div class="col-6 pe-0 ps-5 py-5">
            <ul class="project__details__list p-0 m-0">
                <li class="project__details__list__item d-flex py-3">
                    <span class="col-6 d-block">Client:</span>
                    <span class="col-6 d-block"><?= get_field('client'); ?></span>
                </li>
                <li class="project__details__list__item d-flex py-3">
                    <span class="col-6 d-block">Année:</span>
                    <span class="col-6 d-block"><?= get_field('year'); ?></span>
                </li>
                <li class="project__details__list__item d-flex py-3">
                    <span class="col-6 d-block">Agence:</span>
                    <span class="col-6 d-block"><?= get_field('agency'); ?></span>
                </li>
                <li class="project__details__list__item last d-flex py-3">
                    <span class="col-6 d-block">Mon rôle:</span>
                    <span class="col-6 d-block"><?= get_field('role'); ?></span>
                </li>
            </ul>
        </div>
    </div>

    <div class="row project__gallery py-5">
    <?php
    $images = get_field('gallery');
    if ($images) : foreach ($images as $image) : if ($image) :
    ?>
        <div class="col-12 project__gallery__image my-4 px-0">
            <img src="<?= $image['sizes']['large'] ?>" alt="<?= $image['alt'] ?>" class="project__gallery__image__img" />
        </div>
    <?php endif; endforeach; endif; ?>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>