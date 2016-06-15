<?php get_header(); ?>
<div id="body">
	<div class="wrap">
		<div class="content">
			<h2 class="page-title">Você buscou por: <strong><?php the_search_query(); ?></strong></h2>
			<ul>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<li>
						<?php the_time("d/m/Y"); ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</li>
				<?php endwhile; endif; ?>
			</ul>
			<?php get_template_part('pagination'); ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>