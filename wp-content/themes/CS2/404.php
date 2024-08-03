<?php

get_header();

?>

<div class="container-standard">
	<div class="page-4xx">
		<div class="row">
			<div class="col-12">
				<span class="error-code">404</span>
				<h2><?php _e('Ops', 'cs2') ?></h2>
				<h2><?php _e('Pagina non trovata', 'cs2') ?></h2>
				<a class="btn" href="<?php echo get_home_url(); ?>">Torna in Homepage</a>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
