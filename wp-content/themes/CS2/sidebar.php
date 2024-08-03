<?php
/**
 * @package WordPress
 * @subpackage Scratch_Theme
 */
?>
		
		<hr />
		<div id="secondary_content">
			<div id="secondary_content_search">
				<form id="secondary_content_search_form" method="get" action="<?php bloginfo('home'); ?>">
					<fieldset id="secondary_content_search_fieldset">
						<legend id="secondary_content_search_legend">Search Form</legend>
						<div class="secondary_content_search_item">
							<label for="secondary_content_search_input">Search</label>
							<input type="text" name="s" id="secondary_content_search_input" size="32" />
							<input type="submit" name="secondary_content_search_submit" id="secondary_content_search_submit" value="<?php esc_attr_e('Search'); ?>" />
						</div>
					</fieldset>
				</form>
			</div><!-- / secondary_content_search -->
			<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar()){} else {} ?>
			
		</div><!-- / secondary_content -->