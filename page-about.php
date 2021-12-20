<?php get_header(); ?>

<?php while (have_posts()) : the_post() ?>
    <div class="row about__hero py-5 py-lg-3 d-flex flex-column align-items-center">
        <h1 id="aboutTitle" class="col-12 about__hero__title px-0 m-0 text-center"><?= get_the_title(); ?></h1>
        <div class="col-12 col-lg-8 about__hero__thumbnail">
            <div class="about__hero__thumbnail__wrapper">
                <?php the_post_thumbnail('large', ['class' => 'about__hero__thumbnail__wrapper__img']); ?>
            </div>
            <?php get_template_part('template-parts/scroll-down'); ?>
        </div>
        <h2 id="aboutName" class="col-12 about__hero__name px-0 m-0 text-center"><?= get_field('name'); ?></h2>
    </div>

    <div class="row about__tagline py-3 py-lg-5">
        <h2 id="aboutTagline" class="col-9 about__tagline__content px-0 mt-5 mb-0"><?= get_field('tagline'); ?></h2>
    </div>

    <div class="row about__description py-3 py-lg-5 d-flex flex-column align-items-end">
        <div id="aboutDescriptionTitle" class="col-12 d-flex justify-content-center my-5">
            <p class="col-9 about__description__title m-0 px-0"><?= get_field('description_title'); ?></p>
        </div>
        <p id="aboutDescription" class="col-12 col-lg-6 about__description__text ps-0 pe-0 mb-0 ps-lg-5 mb-lg-5"><?= get_field('description'); ?></p>
    </div>

    <div class="row about__services py-3 py-lg-5">
        <div id="aboutServicesTitle" class="col-12 col-lg-4 about__services__title px-0 mt-5 mb-3 mb-lg-0">
            <h3>Mes services</h3>
        </div>

        <?php
        $services = get_field('services');
        $i = 1;
        if ($services) : foreach ($services as $service) : if ($service) : 
        ?>
        <div id="aboutService--<?= $i; ?>" class="col-12 col-lg-4 about__services__service px-0 mt-3 mb-lg-5 <?= in_array($i, [1, 2]) ? 'mt-lg-5' : 'mt-lg-0'; ?> d-flex">
            <div class="col-3 about__services__service__number">0<?= (string) $i; ?></div>
            <div class="col-9">
                <h4 class="about__services__service__name mb-3"><?= $service['name']; ?></h4>
                <p class="about__services__service__description pe-lg-5"><?= $service['description']; ?></p>
            </div>
        </div>
        <?php $i++; ?>
        <?php endif; endforeach; endif; ?>
    </div>

    <div class="row about__cv py-3 py-lg-5">
        <div id="aboutExpTitle" class="col-12 col-lg-4 about__cv__title px-0 mt-5 mb-0 my-lg-5">
            <h3>Mes expériences</h3>
        </div>

        <ul id="aboutExpList" class="col-12 col-lg-8 about__cv__list px-0 my-3 my-lg-5">
            <?php
            $cvLines = get_field('cv');
            $experiences = [];
            if ($cvLines) : foreach ($cvLines as $cvLine) : if ($cvLine && ($cvLine['title'] !== '')) :
                $experiences[] = $cvLine;
            endif; endforeach;
            $numItems = count($experiences);
            $i = 0;
            foreach ($experiences as $experience) :
            ?>
            <li class="about__cv__list__item py-3 <?= (++$i == $numItems) ? 'last' : ''; ?> d-flex">
                <span class="col-6 pe-3 pe-lg-0"><?= $experience['title']; ?></span>
                <span class="col-4 pe-3 pe-lg-0"><?= $experience['institution']; ?></span>
                <span class="col-2 text-end ps-2 ps-lg-0"><?= $experience['date']; ?></span>
            </li>
            <?php endforeach; endif; ?>
        </ul>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>