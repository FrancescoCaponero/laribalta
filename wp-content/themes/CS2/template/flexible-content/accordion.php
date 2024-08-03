<?php
$faqEl = $args['faq_elements'] ?? [];
$singleAccordion = $args['single_accordion'] ?? '';
if (!empty($singleAccordion['p_accordion_title']) || !empty($singleAccordion['p_accordion_text'])) {
    ?>
    <div class="field__item">
        <div class="accordion__wrapper">
            <div class="accordion__wrapper__content">
                <?php if (!empty($singleAccordion['p_accordion_title'])) { ?>
                    <div <?php echo !empty($faqEl['question']) ? $faqEl['question'] : ''; ?> class="accordion__wrapper__title">
                        <img class="accordion__icon"
                             data-src="<?php echo get_template_directory_uri() ?>/webpack/src/images/icon/plus-black.svg"
                             src="<?php echo get_template_directory_uri() ?>/webpack/src/images/icon/plus-black.svg"
                             alt="<?php _e('Accordion', 'cs2'); ?>" width="21" height="21">
                        <div <?php echo !empty($faqEl['name']) ? $faqEl['name'] : ''; ?> class="field--name-field-p-accordion-title">
                            <?php echo $singleAccordion['p_accordion_title']; ?>
                        </div>
                    </div>
                <?php } ?>

                <?php if (!empty($singleAccordion['p_accordion_text'])) { ?>
                    <div <?php echo !empty($faqEl['answer']) ? $faqEl['answer'] : ''; ?> class="accordion__wrapper__text">
                        <div <?php echo !empty($faqEl['text']) ? $faqEl['text'] : ''; ?> class="accordion__wrapper__text--inner">
                            <?php echo $singleAccordion['p_accordion_text']; ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
