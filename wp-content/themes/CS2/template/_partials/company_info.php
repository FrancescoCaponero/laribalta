<?php
    $name = get_field('info_company_name', 'option') ?? '';
    $vat = get_field('info_vat_number', 'option') ?? '';
?>

<p>
    <?php echo $name ?>
    <br>
    P.IVA <?php echo $vat ?>
</p>