<?php
/**
 *  Includes all extra TinyMCE button
 */
add_action( 'init', 'eteam_list_links_tinymce_buttons' );
function eteam_list_links_tinymce_buttons() {
	add_filter( 'mce_external_plugins', 'eteam_list_links_tinymce_add_buttons' );
	add_filter( 'mce_buttons', 'eteam_list_links_tinymce_register_buttons' );
}

function eteam_list_links_tinymce_add_buttons( $plugin_array ) {

	// insert into TinyMCE plugin
	$plugin_array['eteam_list_links'] = get_template_directory_uri() . '/inc/tinymce/eteam-list-links/scripts.js';
	return $plugin_array;
}

function eteam_list_links_tinymce_register_buttons( $buttons ) {
	array_push( $buttons, 'eteam_list_links' );
	return $buttons;
}
