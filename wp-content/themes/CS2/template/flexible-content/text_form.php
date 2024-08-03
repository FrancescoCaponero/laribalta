<?php
$classWrapper = 'section__text-form__wrapper';
$style_exceptions = $args['p_tf_style_exceptions'] ?? '';

if ($args['p_tf_reverse']) {
    $classWrapper = 'section__text-form__wrapper row-reverse';
}

?>

<div class="<?php print $classWrapper ?> <?php print $style_exceptions ?>">
    <div class="section__text-form__wrapper__column-text">
        <div class="column-text-wrap">

            <?php if ($args['p_tf_text']) { ?>
                <div class="column-text-wrap__text"><?php print $args['p_tf_text'] ?></div>
            <?php } ?>
            <?php if ($args['p_tf_ctas']) { ?>
                <?php foreach ($args['p_tf_ctas'] as $link) { ?>
                    <div class="column-text-wrap__cta">
                        <div class="field--name-field-p-tm-cta">
                            <?php print printCta($link['p_tf_cta']) ?>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
    <div class="section__text-form__wrapper__column-form">
        <div class="column-form-wrap">
            <?php if ($args['p_tf_form']) { ?>
                <div class="column-form-wrap__form">
                    <?php print do_shortcode('[contact-form-7 id="' . $args['p_tf_form'] . '"]') ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>