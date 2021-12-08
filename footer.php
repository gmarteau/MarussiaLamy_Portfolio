        </main>

        <footer class="container-fluid footer">
            <a class="row footer__contact">
                <p class="col-12 footer__contact__line">GET IN</p>
                <p class="col-12 footer__contact__line">TOUCH</p>
                <p class="col-12 footer__contact__line">WITH ME</p>
            </a>

            <div class="row footer__social">
                <div class="col-9 footer__social__socials">
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

                <div class="col-3 footer__social__email">
                    <p>Email</p>
                    <a href="mailto:<?= get_option('admin_email') ?>" class="footer__social__email__link">
                        <?= get_option('admin_email') ?>
                    </a>
                </div>
            </div>
        </footer>
    </div>

<?php wp_footer(); ?>
</body>

</html>