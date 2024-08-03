<?php
$field = get_field('info_address', 'option') ?? [];

if (!is_array($field)) {
	$field = [];
}

foreach ($field as $info) {
	$label = !empty($info['info_address_label']) ? $info['info_address_label'] : '';
	$map_link = !empty($info['info_address_map_directlink']) ? $info['info_address_map_directlink'] : '';
	$address = $info['info_address_txt'];
?>
	<div>
		<span><?php echo $label ?></span>
		<a href="<?php echo $map_link ?>" rel="noopener noreferrer" target="_blank" title="address"><?php echo $address ?></a>
	</div>
<?php
}
