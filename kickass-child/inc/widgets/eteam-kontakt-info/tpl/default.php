<?php
	$min_height = isset($instance['min_height']) ? intval($instance['min_height']) : '';
?>

<div id="kontakt-info-widget" style="min-height: <?php echo $min_height ?>px;">
    <?php if ($instance['title']): ?>
        <h3 class="title"><?php echo esc_html($instance['title']) ?></h3>
    <?php endif; ?>
    <?php if ($instance['contact_list']): ?>
        <div class="contact-list-wrap">
            <?php foreach ($instance['contact_list'] as $x): ?>
                <div class="list-content">
                    <?php if ($x['list_title']): ?>
                        <label><?php echo esc_html($x['list_title']) ?></label>
                    <?php endif; ?>
                    <span><?php echo wp_kses_post($x['content']) ?></span>
                </div><!-- .list-content -->
            <?php endforeach; ?>
        </div><!-- .contact-list-wrap -->
    <?php endif; ?>
</div><!-- #kontakt-info-widget -->