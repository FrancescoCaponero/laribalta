<?php
$classWrapper = '';
$imageDesktop = '';
$imageMobile = '';
$style_exceptions = $args['p_banner_style_exceptions'] ?? '';

if ($args['p_banner_image']) {
    $classWrapper = 'bg__active';
    $imageDesktop = $args['p_banner_image']['sizes']['16_9'];
}
if ($args['p_banner_image_mobile']) {
    $imageMobile = $args['p_banner_image_mobile']['sizes']['3_4'];
} else {
    $imageMobile = $imageDesktop;
}
?>


<div class="section__banner__wrapper <?php print $style_exceptions ?>">
    <div class="banner__wrapper <?php print $classWrapper ?>"
         style="--bg-image:url('<?php print $imageDesktop ?>'); --bg-image-mobile:url('<?php print $imageMobile ?>');">
        <div class="column-text-wrap">
            
            <?php if ($args['p_banner_text']) { ?>
                <div class="column-text-wrap__text">
                    <div class="field--name-field-p-banner-text">
                        <?php print $args['p_banner_text'] ?>
                    </div>
                </div>
            <?php } ?>
            <?php if ($args['p_banner_cta']) { ?>
                <div class="column-text-wrap__cta">
                    <div class="field--name-field-p-banner-cta">
                        <?php print printCta($args['p_banner_cta']) ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
