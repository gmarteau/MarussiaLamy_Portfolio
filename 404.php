<?php get_header(); ?>

<div class="row py-3 py-lg-5">
    <h1 class="col-12 error__title text-center">404</h1>
    <h2 class="col-12 error__subtitle text-center">Il semblerait que vous vous soyez perdu.e.s...</h2>
</div>

<div class="row d-flex justify-content-center py-3 py-md-5 mb-5">
    <a href="<?= get_home_url(); ?>" class="d-block error__link">Retrouver mon chemin</a>
</div>

<?php get_footer(); ?>