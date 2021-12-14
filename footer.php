        </main>

        <?php if (!is_page('contact')) : ?>
        <footer class="container-fluid footer">
            <a class="row footer__contact py-5" href="<?= get_page_link(get_page_by_title('contact')); ?>">
                <p class="col-12 footer__contact__line footer__contact__line--1 m-0 px-0">GET IN</p>
                <p class="col-12 footer__contact__line footer__contact__line--2 m-0 px-0">TOUCH</p>
                <p class="col-12 footer__contact__line footer__contact__line--3 m-0 px-0">WITH ME</p>
                <div class="footer__contact__cta">
                    Contact
                </div>
            </a>

            <div class="row footer__social py-3">
                <div class="col-9 footer__social__socials px-0">
                    <p>Réseaux sociaux</p>
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

                <div class="col-3 footer__social__email px-0">
                    <p>Email</p>
                    <a href="mailto:<?= get_option('admin_email') ?>" class="footer__social__email__link">
                        <?= get_option('admin_email') ?>
                    </a>
                </div>
            </div>
        </footer>
        <?php endif; ?>
    </div>

<?php wp_footer(); ?>
</body>

</html>