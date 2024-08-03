<?php

// ovveride meta description di yoast con campo
// se non viene scritto nulla nel campo prende quello di yoast
function cs2_yoast_metadesc($metadesc) {
    if (is_singular('post')) {
        $custom_description = get_field('article_meta_description');
        if ($custom_description) {
            $metadesc = $custom_description;
        }
    }
    return $metadesc;
}
add_filter('wpseo_metadesc', 'cs2_yoast_metadesc');

function update_excerpt_with_custom_description($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (get_post_type($post_id) != 'post') {
        return;
    }

    $custom_description = get_field('article_meta_description', $post_id);

    if ($custom_description) {
        // Aggiorna l'excerpt del post
        remove_action('save_post', 'update_excerpt_with_custom_description');
        wp_update_post(array(
            'ID' => $post_id,
            'post_excerpt' => $custom_description
        ));
        add_action('save_post', 'update_excerpt_with_custom_description');
    }
}
add_action('save_post', 'update_excerpt_with_custom_description');
