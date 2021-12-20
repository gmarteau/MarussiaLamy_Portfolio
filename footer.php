        </main>

        <?php if (!is_page('contact')) : ?>
        <footer class="container-fluid footer
            <?= is_page('contact') ? 'contact' : ''; ?>
            <?= is_page('about') ? 'about' : ''; ?>
            <?= is_archive() ? 'archive' : ''; ?>
            <?= is_singular('project') ? 'single-project' : ''; ?>
        ">
            <a class="row footer__contact custom-cursor py-3 py-lg-5" href="<?= get_page_link(get_page_by_title('contact')); ?>">
                <div id="getinWrapper">
                    <p id="getin" class="col-12 footer__contact__line m-0 px-0">GET IN</p>
                </div>
                <div id="touchWrapper">
                    <p id="touch" class="col-12 footer__contact__line m-0 px-0">TOUCH</p>
                </div>
                <div id="withmeWrapper">
                    <p id="withme" class="col-12 footer__contact__line m-0 px-0">WITH ME</p>
                </div>
                <div class="footer__contact__cta">
                    Contact
                </div>
            </a>

            <div class="row footer__social py-3">
                <div class="col-12 col-lg-9 footer__social__socials px-0">
                    <p class="mb-0 mb-lg-3">Réseaux sociaux</p>
                    <ul class="p-0 footer__social__socials__list">
                    <?php
                    $socials = wp_get_nav_menu_items('social-media');
                    if ($socials) : 
                    $numItems = count($socials);
                    $i = 0;
                    foreach ($socials as $social) :                       
                    ?>
                        <li class="footer__social__socials__list__item">
                            <a class="footer__social__socials__list__item__link" href="<?= $social->url; ?>">
                                <?= $social->title; ?>
                            </a>
                        </li>
                        <?php if (++$i !== $numItems) : ?>
                            <div class="mx-2">-</div>
                        <?php endif; ?>
                    <?php endforeach; endif; ?>
                    </ul>
                </div>

                <div class="col-12 col-lg-3 footer__social__email px-0">
                    <p class="mb-0 mb-lg-3">Email</p>
                    <a href="mailto:<?= get_option('admin_email') ?>" class="footer__social__email__link">
                        <?= get_option('admin_email') ?>
                    </a>
                </div>
            </div>
        </footer>
        <?php endif; ?>

    <?php wp_footer(); ?>
    </div>
</body>

</html>