<?php
	$author = get_the_author_meta("first_name") . " " . get_the_author_meta("last_name");
	$author_url = get_the_author_meta("first_name");
?>
<div class="post-info">
	<p class="user-info">
		<?php echo get_avatar(get_the_author_meta("email"), 45); ?>
		<span>por <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo ucwords($author); ?></a></span>
		<?php echo get_the_author_meta('jobname'); ?>
	</p>
	<p class="post-meta">
		<?php fb_comments_count(); ?> - <?php the_time('d/m/Y'); ?>
	</p>
</div>