<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
	<head profile="http://gmpg.org/xfn/11">
		<title><?php wp_title("&laquo;", true, "right"); ?> <?php bloginfo("name"); ?></title>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico">
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?v=1" type="text/css" media="screen" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/js/script.js"></script>
		<meta property="fb:app_id" content="357451594346461"/>
		<?php if (is_single()): ?>
			<meta property="og:title" content="<?php the_title(); ?>" />
			<meta property="og:description" content="<?php if(function_exists('aiosp_meta')) : echo stripcslashes(get_post_meta($post->ID, '_aioseop_description', true)); endif; ?>" />
			<meta property="og:image" content="<?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail'); echo $thumb[0]; ?>" />
		<?php else: ?>
			<meta property="og:title" content="Blog do Zoom" />
			<meta property="og:description" content="Conheça um pouco mais sobre os bastidores do Zoom, mercado digital, desenvolvimento de carreira e dicas criativas para tornar o seu dia a dia legal!" />
			<meta property="og:image" content="<?php bloginfo('template_url'); ?>/img/fb-logo.jpg" />
		<?php endif; ?>
		<?php wp_head(); ?>
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-33473123-1']);
			_gaq.push(['_trackPageview']);
			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
		<div id="fb-root"></div>
		<script src="http://connect.facebook.net/pt_BR/all.js#xfbml=1"></script>
		<script>
			(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));

			FB.Event.subscribe('edge.create', function(targetUrl) {
				_gaq.push(['_trackSocial', 'Facebook', 'Like', targetUrl]);
			});
			FB.Event.subscribe('message.send', function(targetUrl) {
				_gaq.push(['_trackSocial', 'Facebook', 'Send', targetUrl]);
			});
		</script>
	</head>
	<body <?php body_class(); ?>><?php echo wp_get_attachment_thumb_url(); ?>
		<div id="header">
			<div class="wrap">
				<?php if (is_home()): $tag = "h1"; else: $tag ="span"; endif; ?>
				<?php if ($tag) echo "<".$tag." class='logo'>"; ?>
					<a href="<?php echo home_url(); ?>/"><?php bloginfo("name"); ?></a>
				<?php if ($tag) echo "</".$tag.">"; ?>
				
				<?php if (get_bloginfo("description") != ""): ?>
					<em><?php bloginfo("description"); ?></em>
				<?php else: ?>
					<em class="temp-slogan"></em>
				<?php endif; ?>
				
				<?php wp_nav_menu(array(
					"menu" => "header",
					"theme_location" => "header",
					"container" => "",
					"menu_class" => "menu"
				)); ?>
				<ul class="corp">
					<li><a href="http://www.zoom.com.br" target="_blank" title="Acesse o Zoom">Acesse o Zoom</a></li>
					<li><a href="<?php bloginfo('url'); ?>/nossos-valores" title="Nossos Valores">Nossos Valores</a></li>
					<li><a href="http://feeds.feedburner.com/BlogDoZoom" target="_blank" title="Assine o Feed">Assine o Feed</a></li>
					<li><a href="<?php bloginfo('url'); ?>/sobre-o-blog" title="Sobre o Blog">Sobre o Blog</a></li>
				</ul>
			</div>
		</div>