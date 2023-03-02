<?php
/**
 * Functions to add SiteOrigin Widget framework.
 *
 * @package Kick_Ass_Theme
 */

// Define base widget folder url.
define( 'KICKASS_WIDGET_FOLDER_URI', get_template_directory_uri() . '/inc/widgets/' );

// Define theme font.
define ( 'KICKASS_WIDGET_FONTS', '' );

/**
 * Add new widgets list.
 *
 * @return array
 */
function kickass_widgets_collection( $folders ) {

	// Get widgets folder.
	$folders[] = get_template_directory() . '/inc/widgets/';

	// Return folders list.
	return $folders;
}
add_filter( 'siteorigin_widgets_widget_folders', 'kickass_widgets_collection' );
