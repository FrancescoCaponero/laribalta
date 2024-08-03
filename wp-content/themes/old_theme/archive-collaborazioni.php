<?php
get_header(); // Includi l'header del tuo tema
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main-collaborazioni" role="main">

        <?php
        // Loop per visualizzare i custom post type "colaborazioni"
        $args = array(
            'post_type' => 'collaborazioni',
            'posts_per_page' => -1, // Mostra tutti i post
        );

        $collaborazioni_query = new WP_Query($args);

        if ($collaborazioni_query->have_posts()) :
            while ($collaborazioni_query->have_posts()) : $collaborazioni_query->the_post();
                // Titolo
                ?>
                <a href="<?php echo esc_url(get_permalink()); ?>">
                <h2><?php the_title(); ?></h2>

                <div class="img-wrapper">
                    <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('thumbnail');
                    }
                    ?>
                </div>
                <?php
                    the_excerpt();
                ?>
                <?php
            endwhile;
            wp_reset_postdata(); // Ripristina le impostazioni del post
        else :
            // Nessun spettacolo trovato
            ?>
            <p>Nessun post disponibile al momento.</p>
        <?php
        endif;
        ?>
        </a>
    </main>
</div>

<?php
get_footer(); // Includi il footer del tuo tema
?>
