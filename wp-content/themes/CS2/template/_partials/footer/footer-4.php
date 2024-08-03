<footer role="contentinfo" class="footer-configuration-4">
    <div class="bg-fullscreen-secondary"></div>
    <div class="container-standard">
        <div class="row">
            <div class="col-12">
                <div class="footer__wrapper">
                    <div class="footer__wrapper__up">
                        <div class="footer__wrapper__logo">
                            <a href="<?php print get_home_url() ?>" rel="noopener">
                                <?php if (null != ($args['footerlogo'])) { ?>
                                    <?php
                                    echo wp_get_attachment_image($args['footerlogo_id'], 'logo');
                                    ?>
                                <?php } else { ?>
                                    <?php echo get_custom_logo() ?>
                                <?php } ?>
                            </a>
                        </div>
                        <div class="footer__wrapper__social">
                            <?php printSocialMenu() ?>
                        </div>
                    </div>
                    <div class="footer__wrapper__info">
                        <div class="footer__wrapper__content">
                            <?php get_template_part('template/_partials/address') ?>
                            <div class="footer__wrapper__contacts">
                                <?php get_template_part('template/_partials/tel') ?>
                                <?php get_template_part('template/_partials/mail') ?>
                            </div>
                            <div class="footer__wrapper__credits">
                                <?php get_template_part('template/_partials/credits') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>