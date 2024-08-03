<?php
// PAGINA DI CATEGORIA TERMINI

get_header();

$pageForPost = get_option('page_for_posts');
$pageFieldLoaded = get_fields($pageForPost);
$pageFieldLoaded['unset_footer'] = true;
$pageFieldLoaded['unset_hero'] = true;

// prendiamo template di page come modello di partenza
get_template_part('page', '', $pageFieldLoaded);
?>

<div class="container-standard">
    <div class="search_header hero__page__wrapper">
        <div class="hero_page hero">
            <div class="row">
                <div class="col hero_page hero__text">
                    <h1 class="hero_page hero__text__title">
                        <?php
                        printf(
                            esc_html__('Risultato della ricerca per: %s', 'default'),
                            '<span>' . get_search_query() . '</span>'
                        );
                        ?>
                    </h1>
                    <?php
                    if ($wp_query->found_posts != 0) { ?>
                        <div class="hero_page hero__text__subtitle pt24">
                            <h4><?php printf(__('Sono stati trovati %s risultati', 'default'), $wp_query->found_posts); ?></h4>

                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <main class="search_results">
        <div class="post-archive_wrapper">
            <?php if (have_posts()) { ?>

                <?php
                while (have_posts()) {
                    the_post();

                    // Include the template part for the content. 
                ?>

                    <?php get_template_part('template/content/single-post', 'single-post'); ?>


                <?php }

                // Previous/next search navigation.
                the_posts_pagination(); ?>
        </div>
    <?php
            } else {
                printf(
                    '<h4 class="notfound-msg">' .
                        esc_html__('Nessun risultato trovato per %s', 'default'),
                    '<span>' . get_search_query() . '</span>'
                        . '</h4>'
                        . '<p>' . esc_html__('Non abbiamo trovato risultati', 'default')
                        . '. ' . esc_html__('prova con un\'altro termine', 'default')
                        . '. </p>'
                );
    ?>
        <div class="searchbox">
            <form role="search" method="get" class="search-form" action="<?php esc_url(home_url('/')) ?>">
                <div class="wrapper-input-search">
                    <input type="search" class="search-field" placeholder="<?php _e('Cerca', 'cs2') ?>" value="<?php echo get_search_query() ?>" name="s" />
                    <img class="input-search-icon" data-src="<?php echo get_template_directory_uri() ?>/webpack/src/images/icon/search-black.svg" src="<?php echo get_template_directory_uri() ?>/webpack/src/images/icon/search-black.svg" alt="Search" width="17" height="17">
                </div>
            </form>
        </div>


    <?php } ?>

    </main><!-- #main -->
</div><!-- #container -->

<?php get_footer(); 