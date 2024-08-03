<?php

// ACF options page
if (!class_exists('acf')) {

    $acf_alert = __('This website needs "Advanced Custom Fields Pro" to run. Please download and activate it', 'cs2');

    // Admin notice
    add_action('admin_notices', 'tp_notice_missing_acf');
    function tp_notice_missing_acf()
    {
        global $acf_alert;
        echo '<div class="notice notice-error notice-large"><div class="notice-title">' . $acf_alert . '</div></div>';
    }

    // Frontend notice
    add_action('template_redirect', 'tp_notice_frontend_missing_acf', 0);
    function tp_notice_frontend_missing_acf()
    {
        global $acf_alert;

        wp_die($acf_alert);
    }

} else {

    // Salvo i campi ACF in un file json
    add_filter('acf/settings/save_json', 'my_acf_json_save_point');
    function my_acf_json_save_point($path)
    {
        // update path
        $path = get_template_directory() . '/inc/acf-json';
        return $path;
    }

    // Carico i campi ACF e abilito il sync
    add_filter('acf/settings/load_json', 'my_acf_json_load_point');
    function my_acf_json_load_point($paths)
    {

        // remove original path (optional)
        unset($paths[0]);

        // append path
        $paths[] = get_template_directory() . '/inc/acf-json';

        return $paths;

    }

}

/* Pagina Opzioni ACF
-------------------------------------------------------- */
add_action('acf/init', 'acf_opt_settings');
function acf_opt_settings()
{

    // Check function exists.
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title' => __('Opzioni tema'),
            'menu_title' => __('Opzioni tema'),
        ));
    }
}
