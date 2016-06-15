<?php
	if (is_home() || is_page('ja-escreveram')):
		$class = "-image";
		$mtype = "Top Posts - Home";
	else:
		$class = "";
		$mtype = "Top Posts - Internas";
	endif;
?>
<div id="most-bar">
	<div class="wrap">
		<div class="most-viewed<?php echo $class; ?>">
			<?php if (is_home()): $tag = "h2"; $class = "page-title"; else: $tag = "p"; $class = "sidebar-title"; endif; ?>
			<<?php echo $tag; ?> class="<?php echo $class; ?>">Posts mais lidos</<?php echo $tag; ?>>
			<?php dynamic_sidebar($mtype); ?>
		</div>
		<div class="most-recent">
			<p class="sidebar-title">Posts mais recentes</p>
			<ul>
				<?php $recentPosts = new WP_Query("showposts=3"); ?>
				<?php while($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
					<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile; ?>
			</ul>
		</div>
		<?php if (!is_home() && !is_page('ja-escreveram')): ?>
			<div class="tag-cloud">
				<?php dynamic_sidebar("Tag Cloud"); ?>
			</div>
		<?php endif; ?>
	</div>
</div>