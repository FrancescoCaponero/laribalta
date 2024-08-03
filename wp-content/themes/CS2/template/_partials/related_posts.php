<?php
$related_posts = $args['related_posts'] ?? [];

if ($related_posts):
?>
    <div class="related-posts">
        <h3><?php esc_html_e('Related Posts'); ?></h3>
        <ul>
            <?php foreach ($related_posts as $post): setup_postdata($post); ?>
                <li>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php wp_reset_postdata(); ?>
    </div>
<?php endif; ?>
