<?php if ($wp_query->max_num_pages > 1): ?>
	<div>
		<?php wp_pagenavi(); ?>
	</div>
<?php endif; ?>