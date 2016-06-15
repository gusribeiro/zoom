<?php
	if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Top Posts - Home',
	        'before_widget' => '',
	        'after_widget' => '',
	        'before_title' => '',
	        'after_title' => '',
   		));
   		register_sidebar(array(
    		'name' => 'Top Posts - Internas',
	        'before_widget' => '',
	        'after_widget' => '',
	        'before_title' => '',
	        'after_title' => '',
   		));
   		register_sidebar(array(
    		'name' => 'Tag Cloud',
	        'before_widget' => '',
	        'after_widget' => '',
	        'before_title' => '<p class="sidebar-title">',
	        'after_title' => '</p>',
   		));
   		register_sidebar(array(
    		'name' => 'Lateral',
	        'before_widget' => '',
	        'after_widget' => '',
	        'before_title' => '<p class="sidebar-title">',
	        'after_title' => '</p>',
   		));
   	}

	if (function_exists('register_nav_menu')) {
		register_nav_menu('header', 'header menu');
		// register_nav_menu('corp', 'corp menu');
	}
	if (function_exists('register_nav_menu')) {
		register_nav_menu('footer', 'footer menu');
		// register_nav_menu('corp', 'corp menu');
	}

	if (function_exists("add_theme_support")) {
		add_theme_support("post-thumbnails");
	}

	if (class_exists('MultiPostThumbnails')) {
        new MultiPostThumbnails(
            array(
                'label' => 'Cabeçalho do Artigo',
                'id' => 'secondary-image',
                'post_type' => 'post'
            )
        );
    }
    if (class_exists('MultiPostThumbnails')) : MultiPostThumbnails::the_post_thumbnail('post', 'secondary-image'); endif;

	add_action("show_user_profile", "show_extra_profile_fields");
	add_action("edit_user_profile", "show_extra_profile_fields");
	function show_extra_profile_fields($user) {
?>
		<table class="form-table">
			<tr>
				<th><label for="jobname">Área de Atuação</label></th>
				<td>
					<input type="text" name="jobname" id="jobname" value="<?php echo esc_attr(get_the_author_meta('jobname', $user->ID)); ?>" class="regular-text" /><br />
					<span class="description">Informe sua área de atuação no Zoom</span>
				</td>
			</tr>
		</table>
<?php
	}
	add_action("personal_options_update", "save_extra_profile_fields");
	add_action("edit_user_profile_update", "save_extra_profile_fields");
	function save_extra_profile_fields($user_id) {
		if (!current_user_can("edit_user", $user_id))
			return false;
		update_usermeta($user_id, "jobname", $_POST["jobname"]);
	}

	function fb_comments_count() {
		$url = get_permalink($post->ID);
		$filecontent = file_get_contents('http://graph.facebook.com/?ids=' . $url);
		$json = json_decode($filecontent);
		$count = $json->$url->comments;
		if (!isset($count) || $count == 0) {
		    $count = "0 comentários";
		} elseif  ($count > 1) {
			$count .= " comentários";
		} else {
			$count .= " comentário";
		}
		echo "<a href='".$url."'>".$count."</a>";
	}

	function get_shortened_url() {
		$url = get_permalink();
		$bitly = json_decode(file_get_contents("http://api.bit.ly/v3/shorten?login=deumzoom&apiKey=R_d5c0016840aedd3f14cfc93fd8d5eb7b&format=json&longUrl=" . get_permalink()));
		echo $bitly->data->url;
	}

	if ( current_user_can(‘contributor’) && !current_user_can(‘upload_files’) ) add_action(‘admin_init’, ‘allow_contributor_uploads’);
	function allow_contributor_uploads() {
		$contributor = get_role(‘contributor’);
		$contributor->add_cap(‘upload_files’);
	}
?>