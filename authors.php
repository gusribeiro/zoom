<?php
	/*
		Template Name: Authors
	*/
	get_header();
?>
<?php get_template_part("most-bar"); ?>
<div id="body">
	<div class="wrap">
		<div class="content">
			<h2 class="page-title"><?php wp_title(""); ?></h2>
			<div class="post-body clrfix">
				<ul class="authors-list">
					<?php
						$top_authors = $wpdb->get_results("
							SELECT u.ID, count(post_author) as posts FROM {$wpdb->posts} as p
							LEFT JOIN {$wpdb->users} as u ON p.post_author = u.ID
							WHERE p.post_status = 'publish'
							AND p.post_type = 'post'
							GROUP by p.post_author
							ORDER by posts DESC
						");

						$i = 1;
						if (!empty($top_authors)) {
							foreach ($top_authors as $key=>$author) {
								echo '<!-- ' . get_the_author_meta('first_name', $author->ID) . ' (' . count_user_posts($author->ID) . ') -->';
								if ($i<=2) : $cname = " fs"; else: $cname = ""; endif;
								echo '<li class="author' . $cname .'">';
								echo 	get_avatar(get_the_author_meta("email", $author->ID), 45);
								echo '	<a href="' . get_author_posts_url(get_the_author_meta('ID', $author->ID)) . '">';
								echo '		<span class="nome">';
								echo 			get_the_author_meta('first_name', $author->ID) . ' ' . get_the_author_meta('last_name', $author->ID);
								echo '		</span>';
								echo '	</a>';
								echo '	<span class="cargo">';
											the_author_meta('jobname', $author->ID);
								echo '	</span>';
								echo '';
								echo '</li>';
								$i++;
							}
						}
					?>
				</ul>
			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>