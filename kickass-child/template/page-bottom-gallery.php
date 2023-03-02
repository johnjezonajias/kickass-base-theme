<?php
/**
 * Template Name: Page Gallery Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kick_Ass_Child_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
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
					</div>
				</div><!-- .content-wrap -->
				<?php
					// Set sidebar at the bottom
					if( is_active_sidebar( 'bottom-gallery-section' ) ) :
						dynamic_sidebar( 'bottom-gallery-section' );
					endif;
				?>
			</article>
		</main>
	</div><!-- #primary -->
	
<?php
get_footer();





