<?php
$info_telephone =  !empty(get_field('info_telephone', 'option')) ? get_field('info_telephone', 'option') : [];
foreach ($info_telephone as $item) {
    $telnumber = !empty($item['info_phone_number']) ? $item['info_phone_number'] : '';
    $tel_label = !empty($item['info_phone_label']) ? $item['info_phone_label'] : '';
?>
    <div>
        <span><?php echo esc_html($tel_label); ?></span>
        <a href="tel:<?php echo esc_attr($telnumber); ?>" target="_blank" rel="noopener noreferrer" title="phone">
            <?php echo esc_html($telnumber); ?>
        </a>
    </div>
<?php
}
?>