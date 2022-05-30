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
                <li class="project__details__list__item d-flex py-3">
                    <span class="col-6 d-block">Mon rôle :</span>
                    <span class="col-6 d-block"><?= get_field('role'); ?></span>
                </li>
                <?php
                $credits = get_field('credits');
                if ($credits) :
                ?>
                    <li class="project__details__list__item d-flex py-3">
                        <span class="col-6 d-block">Crédits :</span>
                        <span class="col-6 d-block"><?= $credits ?></span>
                    </li>
                <?php endif; ?>
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
    $videoFull = get_field('video_full');
    if ($videoFull) :
    ?>
        <div id="projectFullVid" class="col-12 project__gallery__embed my-4 px-0">
            <video autoplay loop muted playsinline controls class="project__gallery__embed__vid">
                <source src="<?= $videoFull['url'] ?>" type="<?= $videoFull['mime_type'] ?>">
            </video>
        </div>
    <?php endif; ?>

    <?php
    $imagesFirst = get_field('gallery_first');
    $imgIndex = 1;
    if ($imagesFirst) : foreach ($imagesFirst as $image) : if ($image) :
    ?>
        <div id="projectImage--<?= $imgIndex; ?>" class="col-12 project__gallery__image my-4 px-0">
            <img src="<?= $image['sizes']['large'] ?>" alt="<?= $image['alt'] ?>" class="project__gallery__image__img" />
        </div>
        <?php $imgIndex++; ?>
    <?php endif; endforeach; endif; ?>

    <?php
    $squaresFirst = get_field('squares_first');
    $squaresFirst = array_filter($squaresFirst, function($square) {
        return $square;
    });
    if ($squaresFirst) :
    ?>
        <div id="projectSquaresFirst" class="col-12 my-4 px-0">
            <div class="row">
            <?php
            $lengthFirst = count($squaresFirst);
            $colSizeFirst = 12 / $lengthFirst;

            if (wp_is_mobile()) {
                $colSizeFirst = 12;
            }

            $i = 1;
            
            foreach ($squaresFirst as $square) : if ($square) :
            ?>
                <?php $isLastItem = $i === $lengthFirst; ?>
                <div class="col-<?= strval($colSizeFirst) ?> project__gallery__square <?= wp_is_mobile() && !$isLastItem ? 'mb-5' : '' ?>">
                    <?php if ($square['type'] === 'image') : ?>
                        <img src="<?= $square['sizes']['medium'] ?>" alt="<?= $square['alt'] ?>" class="project__gallery__square__img" />
                    <?php elseif ($square['type'] === 'video') : ?>
                        <div class="project__gallery__square__vidcontainer">
                            <video autoplay loop muted playsinline controls class="project__gallery__square__vidcontainer__vid">
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
    $imagesSecond = get_field('gallery_second');
    if ($imagesSecond) : foreach ($imagesSecond as $image) : if ($image) :
    ?>
        <div id="projectImage--<?= $imgIndex; ?>" class="col-12 project__gallery__image my-4 px-0">
            <img src="<?= $image['sizes']['large'] ?>" alt="<?= $image['alt'] ?>" class="project__gallery__image__img" />
        </div>
        <?php $imgIndex++; ?>
    <?php endif; endforeach; endif; ?>

    <?php
    $squaresSecond = get_field('squares_second');
    $squaresSecond = array_filter($squaresSecond, function($square) {
        return $square;
    });
    if ($squaresSecond) :
    ?>
        <div id="projectSquaresSecond" class="col-12 my-4 px-0">
            <div class="row">
            <?php
            $lengthSecond = count($squaresSecond);
            $colSizeSecond = 12 / $lengthSecond;

            if (wp_is_mobile()) {
                $colSizeSecond = 12;
            }

            $i = 1;
            
            foreach ($squaresSecond as $square) : if ($square) :
            ?>
                <?php $isLastItem = $i === $lengthSecond; ?>
                <div class="col-<?= strval($colSizeSecond) ?> project__gallery__square <?= wp_is_mobile() && !$isLastItem ? 'mb-5' : '' ?>">
                    <?php if ($square['type'] === 'image') : ?>
                        <img src="<?= $square['sizes']['medium'] ?>" alt="<?= $square['alt'] ?>" class="project__gallery__square__img" />
                    <?php elseif ($square['type'] === 'video') : ?>
                        <div class="project__gallery__square__vidcontainer">
                            <video autoplay loop muted playsinline controls class="project__gallery__square__vidcontainer__vid">
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
    $imagesThird = get_field('gallery_third');
    if ($imagesThird) : foreach ($imagesThird as $image) : if ($image) :
    ?>
        <div id="projectImage--<?= $imgIndex; ?>" class="col-12 project__gallery__image my-4 px-0">
            <img src="<?= $image['sizes']['large'] ?>" alt="<?= $image['alt'] ?>" class="project__gallery__image__img" />
        </div>
        <?php $imgIndex++; ?>
    <?php endif; endforeach; endif; ?>
    </div>

    <div class="row project__others py-5">
        <div class="col-12 project__others__title d-flex align-items-baseline px-0">
            <h3 class="col-11 project__others__title__content px-0 py-0 mt-0 py-lg-5 mt-lg-5">Autres projets</h3>
            <a href="#page-top" class="col-1 d-block chevron-cta chevron-cta--up" data-no-swup><i class="fas fa-chevron-up"></i></a>
        </div>

        <div id="otherProjectsSection" class="col-12 project__others__links px-0 pt-5 d-flex">
            <?php
            $skills = get_the_terms(get_the_ID(), 'skill');
            $slugs = array_map(function ($skill) {
                if ($skill->slug) {
                    return $skill->slug;
                }
            }, $skills);
            $randomIndex = rand(0, count($slugs) - 1);

            $query = new WP_Query([
                'post_type' => 'project',
                'post__not_in' => [get_the_ID()],
                'posts_per_page' => 2,
                'tax_query' => [
                    [
                        'taxonomy' => 'skill',
                        'field' => 'slug',
                        'terms'=> $slugs[$randomIndex],
                    ]
                ]
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