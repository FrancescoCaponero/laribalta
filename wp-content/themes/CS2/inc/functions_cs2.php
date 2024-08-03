<?php

function printLogo()
{
    $logoID = get_theme_mod('custom_logo');
    $logomobile = !empty(get_field('mobile_logo', 'option')) ? get_field('mobile_logo', 'option') : null;

    //$logo = wp_get_attachment_image_src($logoID);

    //if ($logo[0] && !is_wp_error(wp_remote_get($logo[0]))) {
    if ($logoID) {
        //$sorgenteLogo = wp_remote_get($logo[0]);                
?>
        <span class="custom-logo">
            <?php
            //print $sorgenteLogo['body']; 
            ?>
            <?php print printImgSrc(['ID' => $logoID], 'full'); ?>
        </span>
    <?php
    }

    //if ($logomobile && !is_wp_error(wp_remote_get($logomobile))) {
    if ($logomobile) {        
        //$sorgenteLogoMobile = wp_remote_get($logomobile);
    ?>
        <span class="mobile_logo">
            <?php
            //print $sorgenteLogoMobile['body']; 
            ?>
            <?php print printImgSrc($logomobile, 'full'); ?>
        </span>
<?php

    }
}


function printBreadcrumb()
{
    return Breadcrumb_Trail([
        'show_title' => true,
        'show_on_front' => false,
        'before' => '<div class="breadcrumb-container">',
        'after' => '</div>',
        'echo' => false,
        'labels' => array(
            'home' => esc_html__('Home', 'cs2'),
        )
    ]);
}

function printCta($field, $class = '')
{
    if (($field[0]['hero_cta_link_int'] ?? '') || ($field[0]['hero_cta_label'] ?? '')) {
        return "<a class='$class' href='{$field[0]['hero_cta_link_int']}'>{$field[0]['hero_cta_label']}</a>";
    }
    if (($field['url'] ?? '') || ($field['title'] ?? '')) {
        return "<a class='$class' href='{$field['url']}'>{$field['title']}</a>";
    }
}


function printImgSrc($field, $size)
{
    if (!empty($field) && is_array($field) && isset($field['ID'])) {
        $image = wp_get_attachment_image($field['ID'], $size, false, array('class' => 'lazyload'));
        if ($image) {
            return $image;
        }
    }
    // Immagine di fallback
    return "<img src='https://placehold.co/600x400/EEE/31343C' class='lazyload'/>";
}


function printMainMenu()
{
    wp_nav_menu([
        'menu' => 'main',
        'theme_location' => 'main',
        'container' => 'nav',
        'container_id' => 'main-navigation',
        'container_class' => 'navbar-action d-flex',
        'menu_id' => false,
        'menu_class' => 'menunavbar-nav',
        'depth' => 2,
        'fallback_cb' => 'bs5navwalker::fallback',
        'walker' => new bootstrap_5_wp_nav_menu_walker()
    ]);
}

function printFooterMenu()
{
    wp_nav_menu([
        'menu' => 'footer',
        'theme_location' => 'footer',
        'container' => 'nav',
        'container_id' => 'footer-navigation',
        'container_class' => '',
        'menu_id' => false,
        'menu_class' => 'footer-nav',
        'depth' => 2,
        'fallback_cb' => 'bs5navwalker::fallback',
        'walker' => new bootstrap_5_wp_nav_menu_walker()
    ]);
}

function printSocialMenu()
{
    wp_nav_menu([
        'menu' => 'social-menu',
        'theme_location' => 'social-menu',
        'container' => 'nav',
        'container_id' => 'social-menu-navigation',
        'container_class' => '',
        'menu_id' => false,
        'menu_class' => 'social-menu-nav',
        'depth' => 2,
        'fallback_cb' => 'bs5navwalker::fallback',
        'walker' => new bootstrap_5_wp_nav_menu_walker()
    ]);
}
