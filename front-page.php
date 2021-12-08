<?php get_header(); ?>

<?php while (have_posts()) : the_post() ?>
    <ul class="row p-0 home">
    <?php
    $categories = wp_get_nav_menu_items('categories');
    if ($categories) : 
    foreach ($categories as $category) :
    ?>
        <li class="col-12 home__category">
            <a class="home__category__link h1" href="<?= $category->url; ?>"><?= $category->title; ?></a>
        </li>
    <?php endforeach; endif; ?>
    </ul>
<?php endwhile; ?>

<?php get_footer(); ?>