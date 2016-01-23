<?php
//
// Normal Post related functions.
//
add_action( 'admin_init', 'ci_add_cpt_post_meta' );
add_action( 'save_post', 'ci_update_cpt_post_meta' );

if( ! function_exists('ci_add_cpt_post_meta') ):
function ci_add_cpt_post_meta() {
	add_meta_box( 'ci_all_formats_box', __( 'Slider Details', 'ci_theme' ), 'ci_add_all_formats_meta_box', 'post', 'normal', 'high' );
	add_meta_box( 'ci_format_box_video', __( 'Video Details', 'ci_theme' ), 'ci_add_format_video_meta_box', 'post', 'normal', 'high' );
}
endif;

if( ! function_exists('ci_update_cpt_post_meta') ):
function ci_update_cpt_post_meta($post_id) {
	
	if ( !ci_can_save_meta('post') ) return;

	update_post_meta( $post_id, 'ci_format_video_url', esc_url_raw( $_POST['ci_format_video_url'] ) );
	update_post_meta( $post_id, 'ci_format_slider', ci_sanitize_checkbox( $_POST['ci_format_slider'], 'slider' ) );
}
endif;

if( ! function_exists('ci_add_all_formats_meta_box') ):
function ci_add_all_formats_meta_box( $object, $box ) {
	ci_prepare_metabox('post');

	ci_metabox_checkbox('ci_format_slider', 'slider', __("Show this post's image/video on the homepage slider.", 'ci_theme') );
}
endif;

if( ! function_exists('ci_add_format_video_meta_box') ):
function ci_add_format_video_meta_box( $object, $box ) {
	ci_prepare_metabox('post');

	?><p><?php echo sprintf(__('In the following box, you can simply enter the URL of a supported website\'s video. It needs to start with <strong>http://</strong> or <strong>https://</strong> (E.g. <em>%1$s</em>). A list of supported websites can be <a href="%2$s">found here</a>.', 'ci_theme'), 'https://www.youtube.com/watch?v=4Z9WVZddH9w', 'https://codex.wordpress.org/Embeds#Okay.2C_So_What_Sites_Can_I_Embed_From.3F'); ?></p><?php
	ci_metabox_input('ci_format_video_url', __('The URL of the video to be embedded:', 'ci_theme'), array('esc_func' => 'esc_url'));
}
endif;

?>