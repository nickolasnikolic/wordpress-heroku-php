<?php 
add_filter('ci_footer_credits', 'ci_theme_footer_credits');
if( !function_exists('ci_theme_footer_credits') ):
function ci_theme_footer_credits($string){

	return '<a href="https://wordpress.org">'
		. __('Powered by WordPress', 'ci_theme') 
		. '</a>';

}
endif;

add_filter('ci_footer_credits_secondary', 'ci_theme_footer_credits_secondary');
if( !function_exists('ci_theme_footer_credits_secondary') ):
function ci_theme_footer_credits_secondary($string){

	if ( ! CI_WHITELABEL ) {
		return __( 'A theme by CSSIgniter.com', 'ci_theme' );
	} else {
		/* translators: %2$s is replaced by the website's name. */
		return sprintf( __( '<a href="%1$s">%2$s</a>', 'ci_theme' ),
			esc_url( home_url() ),
			get_bloginfo( 'name' )
		);
	}
}
endif;
	
?>