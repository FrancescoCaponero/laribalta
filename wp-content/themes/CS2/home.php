<?php
// PAGINA ELENCO POST

get_header();

$pageForPost = get_option('page_for_posts') ?? '';
$pageFieldLoaded = get_fields($pageForPost) ?? '';
$pageFieldLoaded['unset_footer'] = true;
$pageFieldLoaded['unset_hero'] = false;

// prendiamo template di PAGE come modello di partenza
get_template_part('page', '', $pageFieldLoaded);

// nel loop articoli sfruttiamo le Card già esistenti. dobbiamo quindi mappare i field per farlo stare compatibile.
// se il progetto richiede card custom per l'articolo, si può intervenire creando nuovi template e gestendo diversamente l'array
if (have_posts()) {
    while (have_posts()) {
        the_post();
        $postCurrent = get_post();
        $argsPost['p_cards_card'][] = [
            'link_all_card' => true,
            'p_card_image' => ['sizes' => ['4_3' => get_the_post_thumbnail_url($postCurrent)]],
            //'p_card_icon',
            'p_card_label' => get_the_category($postCurrent->ID)[0]->name,
            'p_card_title' => get_the_title($postCurrent),
            'p_card_text' => get_the_excerpt($postCurrent),
            'p_card_cta' => [
                'url' => get_permalink($postCurrent),
                'title' => esc_html__('Read More', 'cs2'),
            ]
        ];
    }
}

?>


<div class="container-standard">
    <div class="row">
        <div class="col-12">
            <?php if (have_posts()) { ?>

                <div class="row mt-5">
                    <?php
                    get_template_part('template/flexible-content/cards', null, $argsPost);
                    ?>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-12">

                        <?php the_posts_pagination(array(
                            'mid_size' => 2,
                            'prev_text' => '<',
                            'next_text' => '>',
                        )); ?>

                    </div>
                </div>

            <?php } else { ?>

                <div class="row">
                    <div class="col-lg-12">
                        <p><?php esc_html_e('Sorry, no post matched your criteria.', 'cs2'); ?></p>
                    </div>
                </div>

            <?php }; ?>
        </div>
    </div>
</div>


<?php

//get_sidebar();
get_footer(null, ['fields_of_home' => $pageFieldLoaded]);

?>