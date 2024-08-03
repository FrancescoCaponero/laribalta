<?php
if ($args['p_media_select'] == true) {
    $style_exceptions = $args['p_media_style_exceptions'] ?? '';
?>
    <div class="section__media__wrapper <?php print $style_exceptions ?>">
        <div class="column-media-wrap__media">
            <?php
            if ($args['p_media_select'] == 'Immagine') {
                if ($args['p_media_img']) {
                    echo printImgSrc($args['p_media_img'], '4_3');
                }
            } elseif ($args['p_media_select'] == 'Embed') {
                if ($args['p_video_oembed']) {
                    preg_match('/src="(.+?)"/', $args['p_video_oembed'], $matches);
                    $src = $matches[1];

                    $params = ['controls' => 0, 'hd' => 1, 'autohide' => 1];
                    $new_src = add_query_arg($params, $src);
                    $iframe = str_replace($src, $new_src, $args['p_video_oembed']);
                    $iframe = str_replace('></iframe>', ' frameborder="0"></iframe>', $iframe);

                    echo $iframe;
                }
            } elseif ($args['p_media_select'] == 'Video Upload') {
                if ($args['p_media_video']) {
                    $video_url = $args['p_media_video']['url'];
                    $video_format = $args['p_media_video']['mime_type'];
                    echo '<video controls width="100%">';
                    echo '<source src="' . esc_url($video_url) . '" type="' . $video_format . '">';
                    echo 'Il tuo browser non supporta i tag video.';
                    echo '</video>';
                }
            } else {
                print '';
            }
            ?>
        </div>
    </div>
<?php
}
?>