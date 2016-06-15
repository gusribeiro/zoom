<?php get_header(); ?>
<?php get_template_part("most-bar"); ?>
<div id="body">
	<div class="wrap">
		<div class="content">
			<h2 class="page-title">Últimos posts</h2>
			<?php if (!have_posts()): ?>
				<p class="empty-page">Ainda não há posts nesta categoria.</p>
			<?php endif; ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="article">
					<h3 class="post-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php MultiPostThumbnails::the_post_thumbnail('post', 'secondary-image'); ?>
							<span><?php the_title(); ?></span>
						</a>
					</h3>
					<?php get_template_part("post-info"); ?>
					<p class="excerpt"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo get_the_excerpt(); ?></a></p>
				</div>
				<span class="separator">&nbsp;</span>
			<?php endwhile; endif; ?>
			<?php get_template_part('pagination'); ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>