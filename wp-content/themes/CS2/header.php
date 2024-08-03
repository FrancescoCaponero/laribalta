<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_url'); ?>" />
    <title><?php wp_title('&laquo;', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>

    <?php
    $headerClass = $bodyClass = '';
    $headerConfiguration = get_field('configuration_header_sticky', 'option');

    if (!empty($headerConfiguration) && $headerConfiguration[0] == 1) {
        $headerClass = 'header--sticky';
        $bodyClass = 'header_is_sticky';
    }
    ?>
</head>

<body <?php body_class($bodyClass); ?>>
    <div>
        <header role="banner" class="navbar <?php print $headerClass ?>">
            <div class="bg-fullscreen-white"></div>
            <div class="container-standard">
                <div class="row">
                    <div class="col-12">
                        <div class="wrapper-top-bar">
                            <?php if (is_active_sidebar('top_bar')) {
                                dynamic_sidebar('top_bar');
                            } ?>
                        </div>
                        <div class="wrapper-navbar-header">

                            <div class="region-header">
                                <div class="block-system-branding-block">
                                    <a href="<?php print get_home_url() ?>">
                                        <?php printLogo() ?>
                                    </a>
                                </div>

                                <?php
                                printMainMenu();
                                ?>
                            </div>
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </header>


        <div class="wrapper-menu-mobile <?php echo $headerClass ?>">
            <?php
            printMainMenu();
            ?>
        </div>