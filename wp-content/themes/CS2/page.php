<?php
// PAGINA SINGOLA PAGINA - inclusa un po' ovunque

get_header();


$sections = null;

// VARS esiste quando questa pagina è inclusa, tipo da index.php, altrimenti no
$vars = null;
if (isset($args)) {
    $vars = $args;
} else {
    $vars = get_fields();
}
$sections = $vars['page_row'] ?? '';

// Verifico se siamo nella pagina privacy
$pageForPrivacy = get_option('wp_page_for_privacy_policy');
?>
<main role="main">
    <div class="layout-content">


        <article>
            <?php
            if ((isset($vars['unset_hero']) && $vars['unset_hero'] != 1) || !isset($vars['unset_hero'])) {
                get_template_part('template/includes/hero/hero-page', '', $vars);
            }

            if (is_single()) {
                get_template_part('template/includes/hero/hero-single', '', $vars);
            }
            ?>

            <div class="container-standard">
                <div class="row">
                    <div class="col-12">
                        <?php
                        // EDITOR ACF
                        if ($sections) {
                            foreach ($sections as $section) {
                                // ASSEGNAZIONI VALUES 
                                $bg_width_value = $section['p_row_bg_full'][0] ?? '';
                                $bg_image_value = $section['p_row_bg_image']['sizes']['2048x2048'] ?? '';
                                $bg_video_value = !empty($section['p_row_bg_video']['url']) ? 'src="' . $section['p_row_bg_video']['url'] . '"' : '';
                                $bg_video_value_mobile = !empty($section['p_row_bg_video_mobile']['url']) ? 'src="' . $section['p_row_bg_video_mobile']['url'] . '"' : '';
                                $bg_video_value_mobile = !empty($bg_video_value_mobile) ? $bg_video_value_mobile : $bg_video_value;

                                // ASSEGNAZIONI VAR 
                                $txt_color_var = $section['p_row_txt_color'] ? '--txt-color:' .  $section['p_row_txt_color'] . ';' : '';
                                $bg_width_var = ($bg_width_value == 'fullwidth') ? $bg_width_value : 'containerwidth';
                                $style_exceptions = $section['p_row_style_exceptions'] ?? '';
                                $bg_color_var = '--bg-color:' . $section['p_row_bg_color'] . ';';
                                $bg_image_var = '--bg-image:url(' . $bg_image_value . ');';
                                $bg_image_x_var = '--bg-image-x:' .  $section['p_row_bg_x'] . ';';
                                $bg_image_y_var = '--bg-image-y:' .  $section['p_row_bg_y'] . ';';
                                $bg_image_size_var = '--bg-image-size:' . $section['p_row_background_size'] . ';';

                                // OUTPUT
                                $classes = 'section__row__wrapper ' . $bg_width_var . ' ' . $style_exceptions;
                                $styles = $bg_color_var . ' ' . $bg_image_var . ' ' . $bg_image_x_var . ' ' . $bg_image_y_var . ' ' . $bg_image_size_var;
                                $style_color = $txt_color_var;
                        ?>
                                <div class="<?php print $classes ?>">
                                    <div class="section__row__wrapper__layout">

                                        <?php if ($bg_video_value != '') { ?>
                                            <video autoplay muted loop playsinline width="100%" height="100%" class="section__row__wrapper__layout__video section__row__wrapper__layout__video__desktop">
                                                <source <?php print $bg_video_value ?> type="video/mp4">
                                            </video>
                                            <video autoplay muted loop playsinline width="100%" height="100%" class="section__row__wrapper__layout__video section__row__wrapper__layout__video__mobile">
                                                <source <?php print $bg_video_value_mobile ?> type="video/mp4">
                                            </video>
                                            <div class="section__row__wrapper__layout__video__overlay"></div>
                                        <?php } ?>

                                        <div class="section__row__wrapper__layout__bg" style="<?php print $styles ?>"></div>
                                        <div class="section__row__wrapper__layout__content">
                                            <div class="section__row__wrapper__layout__content__txt-color" style="<?php print $style_color ?>">
                                                <?php
                                                if ($section['p_row_items']) {
                                                    foreach ($section['p_row_items'] as $item) {
                                                        $item_template = $item['acf_fc_layout'];
                                                        get_template_part('template/flexible-content/' . $item_template, '', $item);
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        } elseif ($pageForPrivacy == get_the_ID()) {
                            ?>
                            <script src="https://legals.corilla.it/corilla-legals-manager.js" data-type="privacy"></script>
                        <?php
                          } elseif (isset($args['article_content'])) {
                            // Stampa il contenuto dell'articolo
                            if (isset($args['article_content']['content'])) {
                                print $args['article_content']['content'];
                            }

                            if (isset($args['article_content']['related_posts'])) {
                                $related_content = $args['article_content']['related_posts'];
                                get_template_part('template/_partials/related_posts', '', ['related_posts' => $related_content]);
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </article>

    </div>
</main>
<?php

if (!isset($args['unset_footer'])) {
    //get_sidebar();
    get_footer();
}
