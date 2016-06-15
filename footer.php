		<div id="footer">
				<?php if (!is_home() && !is_page('ja-escreveram')):
					wp_nav_menu(array(
						"menu" => "header",
						"theme_location" => "header",
						"container" => "",
						"menu_class" => "menu"
					));

					get_template_part("most-bar");
				endif; ?>
			<div class="copy">
				<p>
					<a href="http://www.zoom.com.br/corp/about.jsp" target="_blank" title="Sobre o Zoom">Sobre o Zoom</a> |
					<a href="<?php bloginfo('url'); ?>/nossos-valores" title="Nossos Valores">Nossos Valores</a> |
					<a href="<?php bloginfo('url'); ?>/sobre-o-blog" title="Sobre o Blog">Sobre o Blog</a> |
					<a href="http://www.zoom.com.br" target="_blank" title="Acesse o Zoom">Acesse o Zoom</a> |
					<a href="http://www.zoom.com.br/contact" target="_blank" title="Fale com o Zoom">Fale com o Zoom</a> |
					<a href="http://www.zoom.com.br/corp/trabalhe-conosco.jsp" target="_blank" title="Trabalhe Conosco">Trabalhe Conosco</a> |
					&copy; Zoom. Todos os direitos reservados.
				</p>
			</div>
		</div>
		<?php if(is_single() || is_page()): ?>
			<script type="text/javascript">window.___gcfg = {lang: 'pt-BR'}; (function() { var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true; po.src = 'https://apis.google.com/js/plusone.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);})();</script>
			<script type="text/javascript">var switchTo5x=true;</script>
			<script type="text/javascript">stLight.options({publisher: "c611fbc3-a35d-4470-924a-6cdfb27005aa"}); </script>
			<script type="text/javascript">
				var addthis_config = {
					data_ga_property: 'UA-33473123-1',
					data_ga_social : true
				};
			</script>
			<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4eb4052319329a5b"></script>
		<?php endif; ?>
		<?php wp_footer(); ?>
		<script>
			!function(d,s,id){
				var js,fjs=d.getElementsByTagName(s)[0];
				if(!d.getElementById(id)){
					js=d.createElement(s);
					js.id=id;
					js.src="https://platform.twitter.com/widgets.js";
					fjs.parentNode.insertBefore(js,fjs);
				}
			}(document,"script","twitter-wjs");

			function trackTwitter(intent_event) {
				if (intent_event) {
					var opt_pagePath;
					if (intent_event.target && intent_event.target.nodeName == 'IFRAME') {
						opt_target = extractParamFromUri(intent_event.target.src, 'url');
					}
					_gaq.push(['_trackSocial', 'Twitter', 'Tweet', opt_pagePath]);
				}
			}
			twttr.ready(function (twttr) {
				twttr.events.bind('tweet', trackTwitter);
			});
		</script>
	</body>
</html>