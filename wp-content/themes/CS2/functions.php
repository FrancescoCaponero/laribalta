<?php
setlocale(LC_NUMERIC, 'en_US.utf-8');

require_once ('inc/bs5navwalker.php');
require_once ('inc/breadcrumb.php');
require_once ('inc/functions_acf.php');
require_once ('inc/functions_tmce.php');
require_once ('inc/functions_cs2.php');
require_once ('inc/functions_custom_backend_style.php');
require_once ('inc/functions_yoast.php');

/* Setup Theme
-------------------------------------------------------- */
if (!function_exists('cs2_setup_theme')) {

    function cs2_setup_theme()
    {
        /*
              
        // Hides Default Post Type

        //Remove Quick Draft Widget
        add_action('wp_dashboard_setup', 'remove_draft_widget', 999);

        function remove_draft_widget()
        {
            remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
        }

        //Remove Post from +New button in Admin Bar
        add_action('admin_bar_menu', 'remove_default_post_type_menu_bar', 999);

        function remove_default_post_type_menu_bar($wp_admin_bar)
        {
            $wp_admin_bar->remove_node('new-post');
        }

        //Remove Post from the Side Menu
        add_action('admin_menu', 'remove_default_post_type');

        function remove_default_post_type()
        {
            remove_menu_page('edit.php');
        } 
        
        */

        // Remove Comments from the Side Menu

        add_action('admin_menu', 'remove_comments', 999);

        function remove_comments()
        {
            remove_menu_page('edit-comments.php');
        }

        // add support excerpt for pages
        add_post_type_support('page', 'excerpt');

        // add support titles
        add_theme_support("title-tag");

        // add theme feed links
        add_theme_support('automatic-feed-links');

        // enable featured image
        add_theme_support("post-thumbnails");
        add_theme_support('align-wide');

        // create custom size images
        /*
        add_image_size('banner', 1296, 352, true);
        add_image_size('banner_mobile', 375, 384, true);
        add_image_size('card', 526, 350, true);
        add_image_size('default_image', 624, 524, true);
        add_image_size('large', 480, 480, true);
        add_image_size('hero_full', 1900, 900, true);
        add_image_size('hero_full_mobile', 375, 745, true);
        add_image_size('max_325x325', 325, 325, false);
        add_image_size('max_650x650', 650, 650, false);
        add_image_size('max_1300x1300', 1300, 1300, false);
        add_image_size('medium', 220, 220, true);
        add_image_size('thumbnail', 100, 100, true);
        add_image_size('wide', 1900, 0, true);
        */
        add_image_size('logo', 150, 0, false);

        //nuovi tagli cs2
        add_image_size('1_1', 1024, 1024, true);
        add_image_size('4_3', 1365, 1024, true);
        add_image_size('16_9', 1920, 1024, true);
        add_image_size('21_9', 1920, 822, true);
        add_image_size('3_4', 1024, 1365, true);
        add_image_size('9_16', 1024, 1920, true);
        add_image_size('9_21', 822, 1920, true);

        // create custom menus
        register_nav_menus(
            array(
                'main' => esc_html__('Primary', 'cs2'),
                'footer' => esc_html__('Footer', 'cs2'),
            )
        );

        //load theme languages
        load_theme_textdomain('cs2', get_template_directory() . '/languages');

        function register_social_menu()
        {
            register_nav_menu('social-menu', __('Social Menu'));
        }
        add_action('init', 'register_social_menu');

    }
}
add_action('after_setup_theme', 'cs2_setup_theme');


/* Register Sidebars
-------------------------------------------------------- */
if (!function_exists('cs2_sidebars')) {

    function cs2_sidebars()
    {


        register_sidebar(
            array(
                'name' => esc_html__('Top Bar', 'cs2'),
                'id' => 'top_bar',
                'description' => esc_html__('Add widgets here.', 'cs2'),
                'before_title' => '<h5>',
                'after_title' => '</h5>',
                'before_widget' => '<div class="widget top-bar-widget %2$s">',
                'after_widget' => '</div>',
            )
        );
        /*
        register_sidebar(array(
            'name' => esc_html__('Header', 'cs2'),
            'id' => 'header',
            'description' => esc_html__('Add widgets here.', 'cs2'),
            'before_title' => '<h5>',
            'after_title' => '</h5>',
            'before_widget' => '<div class="widget header-widget %2$s">',
            'after_widget' => '</div>',
        ));*/

        register_sidebar(
            array(
                'name' => esc_html__('Pre Footer', 'cs2'),
                'id' => 'pre_footer',
                'description' => esc_html__('Add widgets here.', 'cs2'),
                'before_title' => '<h5>',
                'after_title' => '</h5>',
                'before_widget' => '<div class="widget pre-footer-widget %2$s">',
                'after_widget' => '</div>',
            )
        );
    }
}

add_action('widgets_init', 'cs2_sidebars');

/* Custom Logo
-------------------------------------------------------- */

function cs2_custom_logo_setup()
{
    $defaults = array(
        'width' => 224,
        'height' => 70,
        'flex-height' => true,
        'flex-width' => true,
        'header-selector' => array('.header-selector'),
        'header-text' => false,
        'unlink-homepage-logo' => false,
    );
    add_theme_support('custom-logo', $defaults);
}

add_action('after_setup_theme', 'cs2_custom_logo_setup');


/* Custom CF7
-------------------------------------------------------- */
add_filter('wpcf7_autop_or_not', '__return_false');

/* Custom CSS e JS
-------------------------------------------------------- */
add_action('wp_enqueue_scripts', 'cs2_custom_css');
function cs2_custom_css()
{
    if (file_exists(get_template_directory() . '/webpack/dist/font.css')) {
        wp_enqueue_style('custom-font', get_stylesheet_directory_uri() . '/webpack/dist/font.css');
    }
    wp_enqueue_style('swiper-css', get_stylesheet_directory_uri() . '/webpack/dist/libraries/swiper/swiper-bundle.min.css');
    wp_enqueue_style('backend-style', get_stylesheet_directory_uri() . '/webpack/dist/app.css');
    wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.15.3/css/all.css');


}

add_action('wp_head', 'cs2_custom_js');

function cs2_custom_js()
{
    wp_enqueue_script('jquery', '/wp-includes/js/jquery/jquery.js', '', '', ['in-footer' => true]);
    wp_register_script('swiper', get_stylesheet_directory_uri() . '/webpack/dist/libraries/swiper/swiper-bundle.min.js', '', '', ['strategy' => 'defer', 'in-footer' => true]);
    wp_enqueue_script('swiper');
    wp_enqueue_script('js_custom', get_stylesheet_directory_uri() . '/webpack/dist/app.js');
}


/* Corilla LEGALS
-------------------------------------------------------- */

add_action('wp_head', 'cs2_corilla_legals_js_head');
function cs2_corilla_legals_js_head()
{
    ?>
    <script src="https://legals.corilla.it/data.js"></script>
    <script src="https://legals.corilla.it/corilla-legals-manager.js" data-type="cookie"></script>
    <?php
}

function add_menu_social_icons($item_output, $item, $depth, $args)
{
    if ('social-menu' === $args->theme_location && $item->type == 'custom') {
        return '<a href="' . $item->url . '"><i class="fab ' . $item->title . '"></i></a>';
    }
    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'add_menu_social_icons', 10, 4);

/* TinyMCE Styling
-------------------------------------------------------- */

function corilla_add_style_editor($mce_css)
{
    if (!empty($mce_css)) {
        $mce_css .= ',';
    }
    $mce_css .= get_template_directory_uri() . 'other-styles/custom-editor-style.css';
    return $mce_css;
}
add_filter('mce_css', 'corilla_add_style_editor');


// Disabling Gutenberg editor for pages 
function remove_editor()
{
    remove_post_type_support('page', 'editor');
}
add_action('admin_init', 'remove_editor');

// rewrite url for category pagination
function cs2_category_pagination_rewrite_rules()
{
    add_rewrite_rule('^news/([^/]+)/page/([0-9]+)/?$', 'index.php?category_name=$matches[1]&paged=$matches[2]', 'top');
}

add_action('init', 'cs2_category_pagination_rewrite_rules');

/* CSP head
-------------------------------------------------------- */

function CS2_csp_headers()
{
    $default_src = "'self'";
    $script_src = "'self' 'report-sample' 'unsafe-inline' https://cdn.iubenda.com https://cs.iubenda.com https://kit.fontawesome.com https://legals.corilla.it https://use.fontawesome.com https://www.iubenda.com";
    $style_src = "'self' 'report-sample' 'unsafe-inline' *.fontawesome.com fonts.googleapis.com https://www.iubenda.com https://cdn.iubenda.com";
    $font_src = "'self' *.fontawesome.com fonts.googleapis.com fonts.gstatic.com data:";
    $connect_src = "'self' *.fontawesome.com https://legals.corilla.it fonts.gstatic.com https://cdn.iubenda.com https://cs.iubenda.com https://hits-i.iubenda.com";
    $object_src = "'none'";
    $img_src = "'self' *.googleapis.com *.gstatic.com data:";
    $child_src = "'self'";
    $frame_src = "*";
    $base_uri = "'self'";
    $form_action = "'self'";
    $worker_src = "'self'";

    $csp = "default-src $default_src; " .
        "script-src $script_src; " .
        "style-src $style_src; " .
        "font-src $font_src; " .
        "connect-src $connect_src; " .
        "img-src $img_src; " .
        "object-src $object_src; " .
        "child-src $child_src; " .
        "frame-src $frame_src; " .
        "base-uri $base_uri; " .
        "form-action $form_action; " .
        "worker-src $worker_src;";

    echo '<meta http-equiv="Content-Security-Policy" content="' . $csp . '">';
}

add_filter('wp_head', 'CS2_csp_headers');

/* Corilla Image Sitemap
-------------------------------------------------------- */

function generate_image_sitemap($post_type) {

    $posts = get_posts([
        'post_type' => $post_type,
        'posts_per_page' => -1,
        'post_status' => 'publish',
    ]);

    $sitemapContent = "";

    foreach ($posts as $post) {
        $permalink = get_permalink($post->ID);
        $post_content_filtered = apply_filters('the_content', $post->post_content);

        $document = new DOMDocument();
        libxml_use_internal_errors(true);
        $imagesAdded = 0; 

        // Carico il contenuto del post e trovo le immagini
        if (!empty($post_content_filtered)) {
            $document->loadHTML($post_content_filtered);
            $images = $document->getElementsByTagName('img');

            foreach ($images as $image) {
                // Limite di 5 immagini per post
                if ($imagesAdded >= 5) break;

                $imageUrl = $image->getAttribute('src');
                if (is_valid_image($imageUrl)) {
                    $sitemapContent .= "<url>
                        <loc>$permalink</loc>
                        <image:image>
                            <image:loc>$imageUrl</image:loc>
                        </image:image>
                    </url>";
                    $imagesAdded++;
                }
            }
        }

        // Recupero tutte le immagini dai campi personalizzati ACF
        $acf_images = get_all_acf_images($post->ID);
        foreach ($acf_images as $imageUrl) {
            // Limite di 5 immagini per post
            if ($imagesAdded >= 5) break; 

            if (is_valid_image($imageUrl)) {
                $sitemapContent .= "<url>
                    <loc>$permalink</loc>
                    <image:image>
                        <image:loc>$imageUrl</image:loc>
                    </image:image>
                </url>";
                $imagesAdded++;
            }
        }

        // Verifico se ci sono immagini collegate direttamente come metadati
        $thumbnail_id = get_post_thumbnail_id($post->ID);
        if ($thumbnail_id && $imagesAdded < 5) {
            $imageUrl = wp_get_attachment_url($thumbnail_id);
            if (is_valid_image($imageUrl)) {
                $sitemapContent .= "<url>
                    <loc>$permalink</loc>
                    <image:image>
                        <image:loc>$imageUrl</image:loc>
                    </image:image>
                </url>";
                $imagesAdded++;
            }
        }

        libxml_use_internal_errors(false);
    }

    // Output della sitemap XML
    header('Content-Type: application/xml; charset=utf-8');
    echo "<?xml version='1.0' encoding='UTF-8'?>\n";
    echo "<urlset xmlns='http://www.sitemaps.org/schemas/sitemap/0.9' xmlns:image='http://www.google.com/schemas/sitemap-image/1.1'>\n";
    echo $sitemapContent;
    echo "</urlset>";
    die();
}

function get_all_acf_images($post_id) {
    $images = [];
    $fields = get_fields($post_id);

    if ($fields) {
        foreach ($fields as $field) {
            if (is_array($field)) {
                $images = array_merge($images, find_images_in_acf_field($field));
            } elseif (is_string($field) && filter_var($field, FILTER_VALIDATE_URL)) {
                $images[] = $field;
            }
        }
    }

    return $images;
}

function find_images_in_acf_field($field) {
    $images = [];

    if (is_array($field)) {
        foreach ($field as $value) {
            if (is_array($value)) {
                $images = array_merge($images, find_images_in_acf_field($value));
            } elseif (is_string($value) && filter_var($value, FILTER_VALIDATE_URL)) {
                $images[] = $value;
            }
        }
    }

    return $images;
}

function is_valid_image($url) {
    // Controllo se l'URL è un'immagine valida e non è un SVG
    $parsed_url = parse_url($url);
    return strpos($parsed_url['path'], '/wp-content/uploads/') !== false && pathinfo($parsed_url['path'], PATHINFO_EXTENSION) !== 'svg';
}

add_action('template_redirect', function () {
    $request_uri = explode('?', $_SERVER['REQUEST_URI'])[0];
    
    if ($request_uri === '/corillabase/post/sitemap_image') {
        generate_image_sitemap('post');
    } elseif ($request_uri === '/corillabase/page/sitemap_image') {
        generate_image_sitemap('page');
    }
});

