<div class="sidebar">
	<div class="search">
		<p class="sidebar-title">Busca</p>
		<form class="box" method="get" id="searchform" action="<?php bloginfo('url'); ?>">
			<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
			<input type="submit" id="searchsubmit" value="Buscar" />
		</form>
	</div>

	<div class="box fb-like-box" data-href="http://www.facebook.com/deumzoom" data-width="250" data-height="330" data-show-faces="true" data-border-color="#aaaaaa" data-stream="false" data-header="false"></div>

	<div class="feed">
		<p class="box"><a href="http://feeds.feedburner.com/BlogDoZoom" target="_blank" title="Assine o Feed">Assine o Feed</a></p>
	</div>

	<div class="share">
		<p class="sidebar-title">Redes Sociais</p>
		<div class="box">
			<a href="http://twitter.com/deumzoom" target="_blank" class="tw" rel="nofollow" title="Twitter do Zoom">twitter do zoom</a>
			<a href="http://facebook.com/deumzoom" target="_blank" class="fb" rel="nofollow" title="Facebook do Zoom">facebook do zoom</a>
			<a href="https://plus.google.com/111454777187860380454/posts" target="_blank" class="gp" rel="nofollow" title="Google Mais do Zoom">google mais do zoom</a>
			<a href="http://www.linkedin.com/company/zoom-com-br" target="_blank" class="in" rel="nofollow" title="Linkedin do Zoom">linkedin do zoom</a>
			<a href="http://youtube.com/deumzoom" target="_blank" class="yt" rel="nofollow" title="Youtube do Zoom">youtube do zoom</a>
		</div>
	</div>

	<div class="archive">
		<p class="sidebar-title">Arquivos de posts</p>
		<div class="box">
			<ul>
				<?php wp_get_archives("show_post_count=1"); ?>
			</ul>
		</div>
	</div>

	<div class="top-authors">
		<p class="sidebar-title">Já escreveram</p>
		<div class="box">
			<ul class="authors-list">
				<?php
					$top_authors = $wpdb->get_results("
						SELECT u.ID, count(post_author) as posts FROM {$wpdb->posts} as p
						LEFT JOIN {$wpdb->users} as u ON p.post_author = u.ID
						WHERE p.post_status = 'publish'
						AND p.post_type = 'post'
						GROUP by p.post_author
						ORDER by posts DESC
						LIMIT 4
					");

					if (!empty($top_authors)) {
						foreach ($top_authors as $key=>$author) {
							echo '<!-- ' . get_the_author_meta('first_name', $author->ID) . ' (' . count_user_posts($author->ID) . ') -->';
							echo '<li class="author">';
							echo 	get_avatar(get_the_author_meta("email", $author->ID), 45);
							echo '	<a href="' . get_author_posts_url(get_the_author_meta('ID', $author->ID)) . '">';
							echo '		<span class="nome">';
							echo 			get_the_author_meta('first_name', $author->ID) . ' ' . get_the_author_meta('last_name', $author->ID);
							echo '		</span>';
							echo '	</a>';
							echo '	<span class="cargo">';
										the_author_meta('jobname', $author->ID);
							echo '	</span>';
							echo '</li>';
						}
					}
				?>
			</ul>
			<a href="/ja-escreveram" class="all-authors">Ver Todos</a>
		</div>
	</div>

	<div class="twitts">
		<p class="sidebar-title">Últimos tweets <a href="https://twitter.com/deumzoom" class="twitter-follow-button" data-show-count="false" data-lang="pt" data-size="large" data-show-screen-name="false">Siga @deumzoom</a></p>
		<div class="box">
			<?php
				$twitter = file_get_contents("http://search.twitter.com/search.json?q=from:deumzoom");
				$json = json_decode($twitter);
			?>
			<ul>
				<?php for ($i = 0; $i < count($json->results); $i++): ?>
					<li>
						<a href="https://twitter.com/deumzoom/status/<?php echo $json->results[$i]->id_str; ?>" rel="nofollow">
							<?php echo $json->results[$i]->text; ?>
						</a>
					</li>
				<?php endfor; ?>
			</ul>
		</div>
	</div>

	<div class="banner box">
		<a href="http://www.zoom.com.br" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/banner.jpg" /></a>
	</div>
</div>