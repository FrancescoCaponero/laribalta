<?php
$info_email = !empty(get_field('info_email', 'option')) ? get_field('info_email', 'option') : [];

foreach ($info_email as $item) {
    $email = $item['info_email_address'] ?? '';
    $email_label = $item['info_email_label'] ?? '';
?>
    <div>
        <span><?php echo $email_label ?></span>
        <a href="mailto:<?php echo $email ?>" target="_blank" rel="noopener noreferrer" title="email"><?php echo $email ?></a>
    </div>
<?php
}
