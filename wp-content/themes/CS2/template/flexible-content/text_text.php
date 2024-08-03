<?php
if (!empty($args['text_left']) || !empty($args['text_right']) ) {
    $style_exceptions = $args['text_style_exceptions'] ?? '';
?>
<div class="section__tt__wrapper <?php print $style_exceptions ?>">
    <?php if ($args['text_left']) { ?>
        <div class="column-tt-col">
            <?php 
                print $args['text_left'];
                if ($args['image_left']) {
                    print printImgSrc($args['image_left'], '4_3');
                }
            ?>
        </div>
    <?php } 
    if ($args['text_right']) { ?>
        <div class="column-tt-col">
            <?php 
                print $args['text_right'];
                if ($args['image_right']) {
                    print printImgSrc($args['image_right'], '4_3');
                }
            ?>
        </div>
    <?php } ?>
</div>
<?php
}
?>