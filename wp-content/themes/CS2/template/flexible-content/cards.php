<?php
$style_exceptions = $args['p_cards_style_exceptions'] ?? '';
?>
<div class="section__cards__wrapper <?php print $style_exceptions ?>">
    <div class="column-text-wrap">

        <?php if (isset($args['p_cards_text']) && $args['p_cards_text']) { ?>
            <div class="column-text-wrap__text">
                <div class="field--name-field-p-cards-text">
                    <?php print $args['p_cards_text'] ?>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="column-cards-wrap">
        <?php if ($args['p_cards_card']) { ?>
            <div class="column-cards-wrap__cards">
                <div class="field--name-field-p-cards-card">
                    <?php
                    foreach ($args['p_cards_card'] as $singleCard) {
                        get_template_part('template/flexible-content/card', '', $singleCard);
                    }
                    ?>

                </div>
            </div>
        <?php } ?>
    </div>
</div>