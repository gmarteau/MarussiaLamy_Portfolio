<?php get_header(); ?>

<?php while (have_posts()) : the_post() ?>
    <div id="toggleNav" class="toggler">
        <span class="toggler__bar"></span>
        <span class="toggler__bar"></span>
    </div>
    <?php get_template_part('template-parts/single-project-nav'); ?>

    <div id="projectHero" class="row project__hero pt-5 mt-5">
        <h1 class="col-12 project__hero__title text-center px-0"><?= get_the_title(); ?></h1>
        <div class="col-12 project__hero__thumbnail px-0">
            <?php the_post_thumbnail('large', ['class' => 'project__hero__thumbnail__img']); ?>
        </div>
        <?php get_template_part('template-parts/scroll-down'); ?>
    </div>

    <div id="projectInfo" class="row project__info py-5 mt-5">
        <p class="col-12 project__info__client px-0"><?= get_field('client'); ?></p>
        <h2 class="col-12 project__info__subtitle px-0"><?= get_field('subtitle'); ?></h2>
    </div>

    <div class="row project__details py-5 d-flex flex-column align-items-end">
        <p id="projectDescription" class="col-12 project__details__description px-0"><?= get_field('description'); ?></p>
        <div class="col-12 col-lg-6 pe-0 ps-0 ps-lg-5 pt-3 pb-0 py-lg-5">
            <ul id="projectDetails" class="project__details__list p-0 m-0">
                <li class="project__details__list__item d-flex py-3">
                    <span class="col-6 d-block">Client :</span>
                    <span class="col-6 d-block"><?= get_field('client'); ?></span>
                </li>
                <li class="project__details__list__item d-flex py-3">
                    <span class="col-6 d-block">Année :</span>
                    <span class="col-6 d-block"><?= get_field('year'); ?></span>
                </li>
                <li class="project__details__list__item d-flex py-3">
                    <span class="col-6 d-block">Agence :</span>
                    <span class="col-6 d-block"><?= get_field('agency'); ?></span>
                </li>
                <li class="project__details__list__item last d-flex py-3">
                    <span class="col-6 d-block">Mon rôle :</span>
                    <span class="col-6 d-block"><?= get_field('role'); ?></span>
                </li>
            </ul>
        </div>
    </div>

    <div class="row project__gallery py-3 py-lg-5">
    <?php
    $vimeo = get_field('vimeo');
    if ($vimeo) :
    ?>
        <div id="projectVimeo" class="col-12 project__gallery__embed my-4 px-0">
            <?= $vimeo ?>
        </div>
    <?php endif; ?>
    <?php
    $youtube = get_field('youtube');
    if ($youtube) :
    ?>
        <div id="projectYoutube" class="col-12 project__gallery__embed my-4 px-0">
            <?= $youtube ?>
        </div>
    <?php endif; ?>
    <?php
    $squares = get_field('squares');
    $squares = array_filter($squares, function($square) {
        return $square;
    });
    if ($squares) :
    ?>
        <div id="projectSquares" class="col-12 my-4 px-0">
            <div class="row">
            <?php
            $length = count($squares);
            $colSize = 12 / $length;

            if (wp_is_mobile()) {
                $colSize = 12;
            }

            $i = 1;
            
            foreach ($squares as $square) : if ($square) :
            ?>
                <?php $isLastItem = $i === $length; ?>
                <div class="col-<?= strval($colSize) ?> project__gallery__square <?= wp_is_mobile() && !$isLastItem ? 'mb-5' : '' ?>">
                    <?php if ($square['type'] === 'image') : ?>
                        <img src="<?= $square['sizes']['medium'] ?>" alt="<?= $square['alt'] ?>" class="project__gallery__square__img" />
                    <?php elseif ($square['type'] === 'video') : ?>
                        <div class="project__gallery__square__vidcontainer">
                            <video controls class="project__gallery__square__vidcontainer__vid">
                                <source src="<?= $square['url'] ?>" type="<?= $square['mime_type'] ?>">
                            </video>
                        </div>
                    <?php endif; ?>
                </div>
                <?php $i++; ?>
            <?php endif; endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php
    $images = get_field('gallery');
    $i = 1;
    if ($images) : foreach ($images as $image) : if ($image) :
    ?>
        <div id="projectImage--<?= $i; ?>" class="col-12 project__gallery__image my-4 px-0">
            <img src="<?= $image['sizes']['large'] ?>" alt="<?= $image['alt'] ?>" class="project__gallery__image__img" />
        </div>
        <?php $i++; ?>
    <?php endif; endforeach; endif; ?>
    </div>

    <div class="row project__others py-5">
        <div class="col-12 project__others__title d-flex align-items-baseline px-0">
            <h3 class="col-11 project__others__title__content px-0 py-0 mt-0 py-lg-5 mt-lg-5">Autres projets</h3>
            <a href="#page-top" class="col-1 d-block chevron-cta chevron-cta--up" data-no-swup><i class="fas fa-chevron-up"></i></a>
        </div>

        <div id="otherProjectsSection" class="col-12 project__others__links px-0 pt-5 d-flex">
            <?php
            $query = new WP_Query([
                'post_type' => 'project',
                'post__not_in' => [get_the_ID()],
                'posts_per_page' => 2
            ]);
            $i = 1;
            while ($query->have_posts()) : $query->the_post();
            ?>
            <a id="otherProject--<?= $i; ?>" href="<?= get_permalink(); ?>" class="col-6 project__others__links__link d-block text-<?= ($i === 1) ? 'start' : 'end'; ?>">
                <?= ($i === 1) ? 'Previous:' : 'Next:' ?><br />  
                <?= get_the_title(); ?>
            </a>
            <?php $i++; ?>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>