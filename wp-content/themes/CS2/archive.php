<?php
// PAGINA DI CATEGORIA TERMINI

get_header();

$pageForPost = get_option('page_for_posts') ?? '';
$pageFieldLoaded = get_fields($pageForPost) ?? '';
$pageFieldLoaded['unset_footer'] = true;
$pageFieldLoaded['unset_hero'] = true;

// prendiamo template di PAGE come modello di partenza
get_template_part('page', '', $pageFieldLoaded);
?>


    <div class="container-standard">
        <div class="row">
            <div class="col-12">
                <?php if (have_posts()) { ?>

                    <div class="row mt-5">
                        <?php while (have_posts()) {
                            the_post(); ?>

                            <div class="col-12">
                                <?php get_template_part('template/content/single-post'); ?>
                            </div>

                        <?php }; ?>
                    </div>

                    <div class="row mt-5">
                        <div class="col-12">

                            <?php the_posts_pagination(array(
                                'mid_size' => 2,
                                'prev_text' => '<i class="fa-regular fa-angle-left"></i>',
                                'next_text' => '<i class="fa-regular fa-angle-right"></i>',
                            )); ?>

                        </div>
                    </div>

                <?php } else { ?>

                    <div class="row">
                        <div class="col-12">
                            <p><?php esc_html_e('Sorry, no post matched your criteria.', 'cs2'); ?></p>
                        </div>
                    </div>

                <?php }; ?>
            </div>
        </div>
    </div>


<?php

//get_sidebar();
get_footer();
