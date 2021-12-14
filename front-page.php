<?php get_header(); ?>

<?php while (have_posts()) : the_post() ?>
    <ul class="row py-5 px-0 home">
    <?php
    $categories = wp_get_nav_menu_items('categories');
    if ($categories) : 
    foreach ($categories as $category) :
    ?>
        <li class="col-12 home__category px-0">
            <a class="home__category__link h1 m-0" href="<?= $category->url; ?>">
                <p class="home__category__link__content m-0">
                    <?= $category->title; ?>
                </p>
            </a>

            <a class="home__category__img" href="<?= $category->url; ?>">
                <?php
                $query = new WP_Query([
                    'post_type' => 'project',
                    'posts_per_page' => 1,
                    'tax_query' => [
                        [
                            'taxonomy' => 'skill',
                            'field' => 'slug',
                            'terms' => [strtolower($category->title)]
                        ]
                    ]
                ]);
                while ($query->have_posts()) : $query->the_post();
                ?>
                    <?php the_post_thumbnail('medium', ['class' => 'home__category__img__pic']); ?>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </a>
        </li>
    <?php endforeach; endif; ?>
    </ul>
<?php endwhile; ?>

<?php get_footer(); ?>