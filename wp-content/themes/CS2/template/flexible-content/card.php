<?php
$image = null;
$classImage = $classCta = '';
if ($args['p_card_image']) {
    $classImage = 'bg__active';
    $image = $args['p_card_image']['sizes']['4_3'];
}

if(isset($args['link_all_card']) && $args['link_all_card']){
    $classCta = 'stretched-link';
}

?>

<div class="field__item">
    <div class="card__wrapper">
        <div class="card__overlay <?php print $classImage ?>" style="--bg-image:url(<?php print $image ?>)">

            <div class="card__wrapper__content">
                <?php if (isset($args['p_card_icon']) && $args['p_card_icon']) { ?>
                    <div class="card__wrapper__icon">
                        <?php print printImgSrc($args['p_card_icon'], '4_3') ?>
                    </div>
                <?php } ?>
                <?php if (isset($args['p_card_label']) && $args['p_card_label']) { ?>
                    <div class="card__wrapper__label">
                        <div class="field--name-field-p-card-label">
                            <?php print $args['p_card_label'] ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($args['p_card_title']) { ?>
                    <div class="card__wrapper__title">
                        <div class="field--name-field-p-card-title">
                            <?php print $args['p_card_title'] ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isset($args['p_card_text']) && $args['p_card_text']) { ?>
                    <div class="card__wrapper__text">
                        <div class="field--name-field-p-card-text">
                            <?php print $args['p_card_text'] ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if (isset($args['p_card_cta']) && $args['p_card_cta']) { ?>
                    <div class="card__wrapper__cta">
                        <div class="field--name-field-p-card-cta">
                            <?php print printCta($args['p_card_cta'], $classCta) ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>