<?php
/**
 * Component for displaying mobile navigation.
 *
 * @package Kick_Ass_Child_Theme
 */
?>

<div id="top-sidebar-wrap">
	<div class="sidebar-wrap wrap">
		<nav id="mobile-navigation" class="mobile-navigation" role="navigation">
			<?= wp_nav_menu(['theme_location' => 'primary-menu', 'menu_id' => 'primary-menu', 'menu_class' => 'sf-menu sf-vertical', 'depth' => 3]) ?>
		</nav><!-- #mobile-navigation -->
		<div class="copyright-sidebar">
			Copyright &copy; <?= date('Y') ?? '' ?> <a href="<?= get_site_url() ?>"><?= trim(str_replace(['http://', 'https://', 'localhost', '~eteam', '24cms.com', 'webdev.john', '//'], '', get_site_url()), '') ?></a><br>
			All rights reserved.
		</div><!-- .copyright-sidebar -->
	</div>
</div><!-- #top-sidebar-wrap -->