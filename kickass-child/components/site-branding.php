<?php
/**
 * Component for displaying header site branding.
 *
 * @package Kick_Ass_Child_Theme
 */
?>

<div class="site-branding">
	<?php if ( has_custom_logo() ) : the_custom_logo(); else : ?>
		<h1 class="site-title"><a href="<?= esc_url(home_url('/')) ?>" rel="home"><?= bloginfo('name') ?></a></h1>
	<?php endif; ?>
</div><!-- .site-branding -->