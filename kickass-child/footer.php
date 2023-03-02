<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kick_Ass_Child_Theme
 */
?>

			</div><!-- #content -->

			<footer id="colophon" class="site-footer" role="contentinfo">
			<?php
				// Set array values of widget id
				$sidebar_names = array( 'footer-column-1', 'footer-column-2', 'footer-column-3', 'footer-column-4' );

				if ( ! empty( array_filter( $sidebar_names, 'is_active_sidebar' ) ) ) :
				?>
					<div class="wrap footer-wrap">
						<?php foreach ( $sidebar_names as $sidebar_name ) : ?>
							<?php if ( is_active_sidebar( $sidebar_name ) ) : ?>
								<div id="<?php echo $sidebar_name; ?>" class="footer-col <?php echo $sidebar_name; ?>-col">
									<?php dynamic_sidebar( $sidebar_name ); ?>
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
					</div><!-- .footer-wrap -->
				<?php endif; ?>
				
				<?php if( get_theme_mod( 'kickass_credit_text' ) ) : ?>
					<div id="copyright-wrapper">
						<div class="wrap copyright-wrap">
						<?php
							$credit_text = get_theme_mod( 'kickass_credit_text' );
							$credit_link = get_theme_mod( 'kickass_credit_link' );
							if ( $credit_text ) {
								if ( $credit_link ) {
									printf( '<a href="%s" target="_blank" class="cdev">%s</a>', esc_url( $credit_link ), esc_html( $credit_text ) );
								} else {
									echo esc_html( $credit_text );
								}
							}
						?>
						</div>
					</div><!-- #copyright-wrapper -->
				<?php endif; ?>
			</footer>
			<a href="#" id="back-top"></a>
		</div><!-- #page -->
	</div><!-- #the-site-holder -->
</div><!-- #sb-site -->

<?php wp_footer(); ?>

</body>
</html>



