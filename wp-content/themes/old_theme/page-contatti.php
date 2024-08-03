<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ribalta-theme
 */

get_header();
?>
        <?php the_content() ?>
        <div class="color-claimcontact-wrap">
            <div class="copy-claim">
                <div class="copy-claim__logo">
                    <?php
                        the_custom_logo()
                    ?>
                </div>
                <div class="copy-claim__claim">
                    © <?php echo date('Y'); ?> La Ribalta Teatro. Tutti i diritti riservati.
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();