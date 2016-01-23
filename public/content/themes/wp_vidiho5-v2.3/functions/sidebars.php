<?php
add_action( 'widgets_init', 'ci_widgets_init' );
if ( ! function_exists( 'ci_widgets_init' ) ):
function ci_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'ci_theme' ),
		'id'            => 'blog-sidebar',
		'description'   => __( 'The list of widgets assigned here will appear in your blog posts.', 'ci_theme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s group">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Pages Sidebar', 'ci_theme' ),
		'id'            => 'pages-sidebar',
		'description'   => __( 'The list of widgets assigned here will appear in your normal pages.', 'ci_theme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s group">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widgets Column #1', 'ci_theme' ),
		'id'            => 'footer-widgets',
		'description'   => __( 'The widgets here will appear in the footer\'s first column of your website.', 'ci_theme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s group">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widgets Column #2', 'ci_theme' ),
		'id'            => 'footer-widgets-1',
		'description'   => __( 'The widgets here will appear in the footer\'s seconds column of your website.', 'ci_theme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s group">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widgets Column #3', 'ci_theme' ),
		'id'            => 'footer-widgets-2',
		'description'   => __( 'The widgets here will appear in the footer\'s third column of your website.', 'ci_theme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s group">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Social Widget on Header', 'ci_theme' ),
		'id'            => 'header-social-widget',
		'description'   => sprintf( __( 'This widget area is reserved for the Socials Ignited plugin (displays social networks). You need to download the Socials Ignited plugin from %s', 'ci_theme' ), 'https://wordpress.org/extend/plugins/socials-ignited/' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s group">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

}
endif;
?>