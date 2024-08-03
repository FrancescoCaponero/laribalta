<?php
get_header(); // Includi l'header del tuo tema
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <div class="entry-content">
                        <?php
                        // Contenuto del custom post type "Spettacoli"
                        the_content();
                        ?>
                    </div>
                </article>
                <?php
            endwhile;
        endif;
        ?>

    </main>
</div>

<?php
get_footer(); // Includi il footer del tuo tema
?>
