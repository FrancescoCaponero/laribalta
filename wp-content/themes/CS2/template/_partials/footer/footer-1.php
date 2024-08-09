<div class="prefooter">
<div class="container-standard">
        <div class="row">
            <div class="col-12">
        </div>
    </div>
</div>

</div>
<footer role="contentinfo" class="footer-configuration-1">
    <div class="bg-fullscreen-white"></div>
    <div class="container-standard">
        <div class="row">
            <div class="col-12">
                <div class="footer__wrapper">
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
                        <div class="footer__wrapper__contacts">
                           <p>© <?php echo date('Y'); ?> La Ribalta Teatro. Tutti i diritti riservati.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>