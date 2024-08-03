<?php 
/* Custom TINYMCE
-------------------------------------------------------- */
function cs2_add_icons_plugin( $plugin_array ) {
    $plugin_array['custom_icons'] = get_template_directory_uri() . '/inc/acf-js/custom-icons.js';
    return $plugin_array;
}
add_filter( 'mce_external_plugins', 'cs2_add_icons_plugin' );

function add_styles_to_tinymce($mce_css) {
    if (!empty($mce_css)) {
        $mce_css .= ',';
    }
    $mce_css .= 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css';
    $mce_css .= ',' . get_template_directory_uri() . '/webpack/dist/app.css';

    return $mce_css;
}
add_filter('mce_css', 'add_styles_to_tinymce');


function cs2_toolbar($toolbars)
{
    $toolbars['Very Simple'] = array();
    $toolbars['Very Simple'][1] = array('bold', 'italic', 'underline');

    $toolbars['Very Simple and list'] = array();
    $toolbars['Very Simple and list'][1] = array('bold', 'italic', 'underline', 'bullist', 'numlist'); 

    return $toolbars;
}

add_filter('acf/fields/wysiwyg/toolbars', 'cs2_toolbar');

// add custom btn to editor
function cs2_custom_buttons( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    array_push( $buttons, 'custom_icons' );
    return $buttons;
}
add_filter( 'mce_buttons', 'cs2_custom_buttons' );

function cs2_mce_before_init_insert_formats( $init_array ) {  
    $style_formats = array(  
        array(  
            'title' => 'Special Heading',  
            'block' => 'h1',  
            'classes' => 'special-heading',
            'wrapper' => false,
        ),
        array(  
            'title' => 'Highlighted Text',  
            'inline' => 'span',  
            'classes' => 'highlighted',
            'wrapper' => true,
        ),
        array(  
            'title' => 'Custom Quote',  
            'block' => 'blockquote',  
            'classes' => 'custom-quote',
            'wrapper' => false,
        ),
        array(  
            'title' => 'List element, inline',  
            'block' => 'div',  
            'selector' => 'ul',
            'classes' => 'ul--inline',            
            'wrapper' => false,
        ),
    );  
    $init_array['style_formats'] = json_encode( $style_formats );  
    return $init_array;  
} 
add_filter( 'tiny_mce_before_init', 'cs2_mce_before_init_insert_formats' );  


