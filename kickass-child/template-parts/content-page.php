<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kickass
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if( ! is_front_page() ) : ?>
		<header class="entry-header">
			<div class="wrap">
				<?php if( get_field( 'custom_page_title' ) ) : ?>
					<h1 class="entry-title"><?php echo get_field( 'custom_page_title' ); ?></h1>
				<?php else:
					the_title( '<h1 class="entry-title">', '</h1>' );
				endif; ?>
			</div>
		</header><!-- .entry-header -->
	<?php endif; ?>
	<div class="content-wrap">
		<div class="entry-content">
			<div class="wrap">
				<?php the_content(); ?>
			</div>
		</div><!-- .entry-content -->
	</div><!-- .content-wrap -->
</article><!-- #post-## -->

