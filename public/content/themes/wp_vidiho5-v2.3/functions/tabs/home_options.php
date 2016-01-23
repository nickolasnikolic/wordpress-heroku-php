<?php global $ci, $ci_defaults, $load_defaults; ?>
<?php if ($load_defaults===TRUE): ?>
<?php
	add_filter('ci_panel_tabs', 'ci_add_tab_homepage_options', 20);
	if( !function_exists('ci_add_tab_homepage_options') ):
		function ci_add_tab_homepage_options($tabs) 
		{ 
			$tabs[sanitize_key(basename(__FILE__, '.php'))] = __('Homepage Options', 'ci_theme'); 
			return $tabs; 
		}
	endif;

	// Default values for options go here.
	// $ci_defaults['option_name'] = 'default_value';
	// or
	// load_panel_snippet( 'snippet_name' );
	$ci_defaults['front_video_posts']  = '4';
	$ci_defaults['front_normal_posts'] = '3';

	load_panel_snippet('slider_flexslider');

?>
<?php else: ?>

	<fieldset class="set">
		<p class="guide"><?php _e( "Set how many normal and how many video posts to appear on the homepage. As the video posts are displayed in two columns, it's recommended that you set a multiple of 2 (e.g. 4, 6, 8, etc).", 'ci_theme' ); ?></p>
		<?php ci_panel_input( 'front_video_posts', __( 'Number of video posts', 'ci_theme' ) ); ?>
		<?php ci_panel_input( 'front_normal_posts', __( 'Number of normal posts', 'ci_theme' ) ); ?>
	</fieldset>

	<?php load_panel_snippet('slider_flexslider'); ?>

<?php endif; ?>