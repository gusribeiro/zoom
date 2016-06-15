<?php get_header(); ?>
<div id="body">
	<div class="wrap">
		<?php get_template_part("share-buttons"); ?>
		<div class="content">
			<div class="post-body">
				<?php while (have_posts()) : the_post(); ?>
					<h1 class="post-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php MultiPostThumbnails::the_post_thumbnail('post', 'secondary-image'); ?>
							<span><?php the_title(); ?></span>
						</a>
					</h1>
					<?php the_content(); ?>
					<p class="post-tags"><?php the_tags("Categorias: "); ?></p>
				<?php endwhile; ?>
				<?php get_template_part("post-info"); ?>
				<?php comments_template(); ?>
			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>