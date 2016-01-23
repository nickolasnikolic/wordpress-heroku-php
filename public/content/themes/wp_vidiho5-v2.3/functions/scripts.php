<?php
//
// Uncomment one of the following two. Their functions are in panel/generic.php
//
//add_action('wp_enqueue_scripts', 'ci_enqueue_modernizr', 1);
add_action('wp_enqueue_scripts', 'ci_print_html5shim', 1);


// This function lives in panel/generic.php
add_action('wp_footer', 'ci_print_selectivizr', 100);


add_action('init', 'ci_register_theme_scripts');
if( !function_exists('ci_register_theme_scripts') ):
function ci_register_theme_scripts()
{
	//
	// Register all scripts here, both front-end and admin. 
	// There is no need to register them conditionally, as the enqueueing can be conditional.
	//

	wp_register_script('jquery-mmenu', get_child_or_parent_file_uri('/js/jquery.mmenu.min.all.js'), array('jquery'), '4.3.4', true);
	wp_register_script('jquery-flexslider', get_child_or_parent_file_uri('/js/jquery.flexslider.js'), array('jquery'), '2.2.2', true);
	wp_register_script('jquery-requestAnimationFrame', get_child_or_parent_file_uri('/js/jquery.requestAnimationFrame.js'), array('jquery'), false, true);
	wp_register_script('jquery-mousewheel', get_child_or_parent_file_uri('/js/jquery.mousewheel.js'), array('jquery'), '3.0.6', true);
	wp_register_script('ilightbox', get_child_or_parent_file_uri('/js/ilightbox.min.js'), array('jquery'), '2.2.0', true);
	wp_register_script('matchHeight', get_child_or_parent_file_uri('/js/jquery.matchHeight-min.js'), array('jquery'), '1.0', true);

	wp_register_script( 'ci-front-scripts', get_child_or_parent_file_uri( '/js/scripts.js' ), array(
		'jquery',
		'jquery-superfish',
		'jquery-mmenu',
		'jquery-flexslider',
		'jquery-mousewheel',
		'jquery-requestAnimationFrame',
		'ilightbox',
		'matchHeight',
		'jquery-fitVids'
	), CI_THEME_VERSION, true );

}
endif;


add_action('wp_enqueue_scripts', 'ci_enqueue_theme_scripts');
if( !function_exists('ci_enqueue_theme_scripts') ):
function ci_enqueue_theme_scripts()
{
	//
	// Enqueue all (or most) front-end scripts here.
	// They can be also enqueued from within template files.
	//	
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );


	$params['slider_autoslide'] = ci_setting( 'slider_autoslide' ) == 'enabled' ? true : false;
	$params['slider_effect']    = ci_setting( 'slider_effect' );
	$params['slider_direction'] = ci_setting( 'slider_direction' );
	$params['slider_duration']  = (string) ci_setting( 'slider_duration' );
	$params['slider_speed']     = (string) ci_setting( 'slider_speed' );
	wp_localize_script( 'ci-front-scripts', 'ThemeOption', $params );
	wp_enqueue_script( 'ci-front-scripts' );

}
endif;


add_action('admin_enqueue_scripts','ci_enqueue_admin_theme_scripts');
if( !function_exists('ci_enqueue_admin_theme_scripts') ):
function ci_enqueue_admin_theme_scripts() 
{
	global $pagenow;

	//
	// Enqueue here scripts that are to be loaded on all admin pages.
	//

	if(is_admin() and $pagenow=='themes.php' and isset($_GET['page']) and $_GET['page']=='ci_panel.php')
	{
		//
		// Enqueue here scripts that are to be loaded only on CSSIgniter Settings panel.
		//

	}
}
endif;

?>