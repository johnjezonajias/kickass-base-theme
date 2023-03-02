<?php
global $post;
$post_slug = $post->post_name;

$counter = 1;
$link_url = '';

$perma = get_permalink();
?>

<div id="eteam-box-slider-widget">
	<div class="wrap">
		<?php if( $instance['title'] ) echo '<h2 class="widget-title">' . $instance['title'] . '</h2>'; ?>
	</div>
	<div id="box-slider-wrap">
		<div class="wrap">
			<div class="bxslider">
				<?php foreach( $instance['box-slider'] as $x ) { ?>
					<?php
						$page_link = sow_esc_url( $x['slide-url'] );
						if( $perma != $page_link ) { ?>
							<div class="bxslider-item" <?php echo 'id="box-' . $counter . '"'; ?>>
								<div class="bxslider-wrap">
									<?php
										if( $x['slide-url'] ) $link_url = '<a href="' . sow_esc_url( $x['slide-url'] ) . '"' . ( $x['slide-tab'] ? ' target="_blank"' : '' ) . ' class="btn-2">' . ( $x['slide-btn'] ? $x['slide-btn'] : 'Se Projekt' ) . '</a>';

										$thumbnail = wp_get_attachment_image_src( $x['image'], 'eteam-boxslider-thumbnail' );
										echo '<img src="' . $thumbnail[0] . '" width="' . $thumbnail[1] .'" height="' . $thumbnail[2] .'" alt="' . $x['slide-title'] . '" title="' . $x['slide-title'] . '" /><figcaption><h2>' . $x['slide-title'] . '</h2>' . $link_url . '</figcaption>';
									?>
								</div><!-- .bxslider-wrap -->
							</div><!-- .bxslider-item -->
						<?php };
					?>
					<?php $counter++; ?>
				<?php } ?>
			</div><!-- .bxslider -->
		</div><!-- .wrap -->
	</div><!-- #box-slider-wrap -->
</div><!-- #eteam-box-slider-widget -->