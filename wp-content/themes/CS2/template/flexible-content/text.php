<?php
if ($args['p_t_text']) {
    $style_exceptions = $args['p_t_style_exceptions'] ?? '';
?>
    <div class="section__text__wrapper <?php print $style_exceptions?>">
        <div class="column-text-wrap">
            <?php print $args['p_t_text'] ?>
        </div>
    </div>
<?php
}
?>