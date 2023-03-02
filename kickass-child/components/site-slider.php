<?php
/**
 * Component for displaying the banner slider.
 *
 * @package Kick_Ass_Child_Theme
 */
?>

<?php
	if ( get_theme_mod('kickass_fs_shortcode') ?? get_theme_mod('kickass_cs_shortcode') ) :  
		echo '<div id="slider" class="site-slider">' . do_shortcode( get_theme_mod( is_front_page() ? 'kickass_fs_shortcode' : 'kickass_cs_shortcode' ) ) . '</div>';
	endif;
?>