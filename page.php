<?php get_header(); ?>
<div id="body">
	<div class="wrap">
		<?php get_template_part("share-buttons"); ?>
		<div class="content">
			<div class="post-body">
				<?php while (have_posts()) : the_post(); ?>
					<!-- <h1 class="post-title">
						<?php MultiPostThumbnails::the_post_thumbnail('post', 'secondary-image'); ?>
						<span><?php the_title(); ?></span>
					</h1> -->
					<?php the_content(); ?>
					<p class="post-tags"><?php the_tags("Categorias: "); ?></p>
				<?php endwhile; ?>
			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>