<?php
/**
 * Component for displaying main navigation.
 *
 * @package Kick_Ass_Child_Theme
 */
?>

<div id="header-nav-wrap">
	<nav id="site-navigation" class="main-navigation" role="navigation">
		<?php
		// Set navigation menu
		wp_nav_menu( 
			array( 
				'theme_location' => 'primary-menu',
				'menu_id'	 => 'primary-menu',
			)
		);
		 ?>
	</nav><!-- #site-navigation -->
</div><!-- #header-nav-wrap -->
