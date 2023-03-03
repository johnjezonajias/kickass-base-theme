<?php
/**
 * Component for displaying header contact.
 *
 * @package Kick_Ass_Child_Theme
 */
?>

<div id="header-contact">
	<?php
	// Set variables $header_phone and $header_email
	$header_phone = get_theme_mod( 'kickass_header_phone' );
	$header_email = get_theme_mod( 'kickass_header_email' );
	
	// Display header boxes.
	if ( $header_phone ) : ?>
		<div class="box phone">
			<a href="tel:<?php '+' . preg_replace( '/[^0-9]/', '', $header_phone ); ?>">
				<?php $header_phone ?>
			</a>
		</div><!-- .box -->
	<?php endif; ?>
	<?php if ( $header_email ) : ?>
		<div class="box email">
			<a href="mailto:<?php $header_email ?>">
				<?php $header_email ?>
			</a>
		</div><!-- .box -->
	<?php endif; ?>
</div><!-- #header-contact -->
