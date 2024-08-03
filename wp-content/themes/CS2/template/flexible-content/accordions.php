<?php
$style_exceptions = $args['p_accordions_style_exceptions'] ?? '';
$FAQPage_metadata = $args['p_faq_metadata'] ?? '';
$FAQPage_metadata_elements = [];

if ($FAQPage_metadata) {
    $FAQPage_metadata_elements = [
        'question' => 'itemscope itemprop="mainEntity" itemtype="https://schema.org/Question"',
        'answer' => 'itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"',
        'name' => 'itemprop="name"',
        'text' => 'itemprop="text"',
    ];
}
?>
<div class="section__accordions__wrapper <?php print $style_exceptions ?>">
    <div class="column-text-wrap">
        <?php if (!empty($args['p_accordions_text'])) { ?>
            <div class="column-text-wrap__text">
                <div class="field--name-field-p-accordions-text">
                    <?php print $args['p_accordions_text']; ?>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="column-accordions-wrap">
        <?php if (!empty($args['p_accordions_accordion'])) { ?>
            <div class="column-accordions-wrap__accordions">
                <div class="field--name-field-p-accordions-accordion">
                <?php
                    foreach ($args['p_accordions_accordion'] as $singleAccordion) {
                        if (!empty($FAQPage_metadata_elements)) {
                            $accordion_data = [
                                'faq_elements' => $FAQPage_metadata_elements,
                                'single_accordion' => $singleAccordion,
                            ];
                        } else {
                            $accordion_data = [
                                'single_accordion' => $singleAccordion,
                            ];
                        }
                        get_template_part('template/flexible-content/accordion', '', $accordion_data);
                    }
                    ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
