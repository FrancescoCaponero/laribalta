<?php
$selected_cpt = $args['post_type_selector'];

if( $selected_cpt && $selected_cpt !== 'cpt_none' ) {
    $args = array(
        'post_type' => $selected_cpt,
        'posts_per_page' => -1,
        'post_status' => array('publish')
    );
    $query = new WP_Query( $args );

    if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post();
            $post_index = $query->current_post + 1; 
            $post_class = ($post_index % 2 == 0) ? ' custom-post-item-even' : ' custom-post-item-odd';
            ?>
            <div class="custom-post-item<?php echo $post_class; ?>">
                <h2><?php the_title(); ?></h2>
                <div class="custom-post-image">
                    <?php 
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail('medium'); 
                    } 
                    ?>
                </div>
                <div class="custom-post-excerpt">
                    <?php the_excerpt(); ?>
                </div>
                <a class="custom-post-link" href="<?php the_permalink(); ?>">Scopri di più</a>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        return '';
    endif;
}
?>
