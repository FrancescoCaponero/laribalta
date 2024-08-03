<?php
$footerConfiguration = get_field('configuration_footer', 'option')[0] ?? 1;

$footerlogo = get_field('footer_logo', 'option') ?? [];
$footerlogo_id = $footerlogo['id'] ?? '';

get_template_part("template/_partials/footer/footer-$footerConfiguration", null, ['footerlogo' => $footerlogo,'footerlogo_id' => $footerlogo_id]);

?>
<?php wp_footer(); ?>
</div>
</body>

</html>