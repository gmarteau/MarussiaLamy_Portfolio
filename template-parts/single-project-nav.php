<ul class="single-project-nav mt-5 py-5 px-0">
<?php
$categories = wp_get_nav_menu_items('categories');
$i = 0;
if ($categories) : 
foreach ($categories as $category) :
?>
    <li class="col-12 single-project-nav__category px-0">
        <div class="single-project-nav__category__link-wrapper">
            <a class="single-project-nav__category__link custom-cursor m-0" href="<?= $category->url; ?>">
                <?= $category->title; ?>
            </a>
        </div>
    </li>
    <?php $i++; ?>
<?php endforeach; endif; ?>
</ul>