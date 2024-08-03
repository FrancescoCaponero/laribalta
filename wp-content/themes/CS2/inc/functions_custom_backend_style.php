<?php
function corilla_enqueue_acf_admin_styles() {
    wp_enqueue_style('corilla-acf-admin-styles', get_template_directory_uri() . '/other-styles/custom-acf-style.css');
}

add_action('acf/input/admin_head', 'corilla_enqueue_acf_admin_styles');    

