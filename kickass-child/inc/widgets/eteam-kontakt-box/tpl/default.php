<?php
	$min_height = isset($instance['min_height']) ? intval($instance['min_height']) : '';
?>

<div id="kontakt-box-widget" style="min-height: <?php echo $min_height ?>px;">
    <?php if (!empty($instance['title'])): ?>
        <h3 class="title"><?php echo esc_html($instance['title']) ?></h3>
    <?php endif; ?>

    <?php if (!empty($instance['content'])): ?>
        <div class="text-widget"><?php echo wp_kses_post($instance['content']) ?></div>
    <?php endif; ?>
</div><!-- #kontakt-box-widget -->