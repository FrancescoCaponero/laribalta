<?php
/**
 * Plugin Name: Corilla Noupdate Plugins
 * Description: Questo plugin blocca l'aggiornamento di plugin critici.
 * Version: 1.0
 * Author: Corilla
 */



// Disallow updates for critical plugins (remove notification)
function disable_plugin_updates( $value ) {

    $pluginsToDisable = [
        'revslider/revslider.php',
        'LayerSlider/layerslider.php',
        'masterslider/masterslider.php',
        'jetpack/jetpack.php',
        'advanced-custom-fields-pro/acf.php',
        'jet-engine/jet-engine.php',
    ];

    if ( isset($value) && is_object($value) ) {
        foreach ($pluginsToDisable as $plugin) {
            if ( isset( $value->response[$plugin] ) ) {
                unset( $value->response[$plugin] );
            }
        }
    }
    return $value;
}

add_filter( 'site_transient_update_plugins', 'disable_plugin_updates' );