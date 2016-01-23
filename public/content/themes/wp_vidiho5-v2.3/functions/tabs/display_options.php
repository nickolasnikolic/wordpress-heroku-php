<?php global $ci, $ci_defaults, $load_defaults, $content_width; ?>
<?php if ($load_defaults===TRUE): ?>
<?php
	add_filter('ci_panel_tabs', 'ci_add_tab_display_options', 40);
	if( !function_exists('ci_add_tab_display_options') ):
		function ci_add_tab_display_options($tabs) 
		{ 
			$tabs[sanitize_key(basename(__FILE__, '.php'))] = __('Display Options', 'ci_theme'); 
			return $tabs; 
		}
	endif;

	// Default values for options go here.
	// $ci_defaults['option_name'] = 'default_value';
	// or
	// load_panel_snippet( 'snippet_name' );

	load_panel_snippet('pagination');
	load_panel_snippet('excerpt');
	load_panel_snippet('comments');
	load_panel_snippet('featured_image_single');
	load_panel_snippet('featured_image_fullwidth');

?>
<?php else: ?>

	<?php load_panel_snippet('pagination'); ?>

	<style type="text/css">
		#ci-panel-excerpt-preview-content,
		#ci-panel-excerpt-read-more {
			display: none;
		}
	</style>
	<?php load_panel_snippet('excerpt'); ?>

	<?php load_panel_snippet('comments'); ?>

	<?php load_panel_snippet('featured_image_single'); ?>

	<?php load_panel_snippet('featured_image_fullwidth'); ?>

<?php endif; ?>