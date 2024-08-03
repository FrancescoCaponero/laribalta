<?php
$classWrapper = 'section__text-media__wrapper';
$style_exceptions = $args['p_tm_style_exceptions'] ?? '';

if ($args['p_tm_reverse']) {
    $classWrapper = 'section__text-media__wrapper row-reverse';
}

?>

<div class="<?php print $classWrapper ?> <?php print $style_exceptions ?>">
    <div class="section__text-media__wrapper__column-text">
        <div class="column-text-wrap">

            <?php if ($args['p_tm_text']) { ?>
                <div class="column-text-wrap__text"><?php print $args['p_tm_text'] ?></div>
            <?php } ?>
            <?php if ($args['p_tm_ctas']) { ?>
                <?php foreach ($args['p_tm_ctas'] as $link) { ?>
                    <div class="column-text-wrap__cta">
                        <div class="field--name-field-p-tm-cta">
                            <?php print printCta($link['p_tm_cta']) ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
    <div class="section__text-media__wrapper__column-media">
        <div class="column-media-wrap">
            <?php if ($args['p_tm_media']) { ?>
                <div class="column-media-wrap__media">
                    <?php if ($args['p_tm_media']['mime_type'] == 'video/mp4') { ?>
                        <video autoplay muted loop width="100%" height="100%">
                            <source src="<?php print $args['p_tm_media']['url'] ?>" type="video/mp4">
                        </video>
                    <?php } else {
                        echo printImgSrc($args['p_tm_media'], '4_3');
                    } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>