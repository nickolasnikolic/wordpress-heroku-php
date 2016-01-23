<?php
	get_template_part('panel/constants');

	load_theme_textdomain( 'ci_theme', get_template_directory() . '/lang' );

	// This is the main options array. Can be accessed as a global in order to reduce function calls.
	$ci = get_option(THEME_OPTIONS);
	$ci_defaults = array();

	// The $content_width needs to be before the inclusion of the rest of the files, as it is used inside of some of them.
	if ( ! isset( $content_width ) ) $content_width = 717;

	//
	// Let's bootstrap the theme.
	//
	get_template_part('panel/bootstrap');

	//
	// Let WordPress manage the title.
	//
	add_theme_support( 'title-tag' );

	//
	// HTML5 Support
	//
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	//
	// Define our various image sizes.
	//
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 720, 420, true );
	add_image_size( 'homepage_slider', 1090, 613, true);


	// Define our post formats
	add_theme_support( 'post-formats', array( 'video' ) );
	add_post_type_support( 'post', 'post-formats' );


	// Let the user choose a color scheme on each post individually.
	add_ci_theme_support('post-color-scheme', array('page', 'post'));
