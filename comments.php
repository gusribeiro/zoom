<div class="post-comments">
	<?php if (post_password_required()) : ?>
		<!-- ToDo: Adicionar mensagem caso seja necessário login para comentar -->
		<?php return; ?>
	<?php endif; ?>

	<?php if (comments_open()) : ?>
		<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-num-posts="50" data-width="668"></div>
	<?php endif; ?>

	<?php if (!comments_open()) : ?>
		<!-- ToDo: Comentário desabilitado. -->
	<?php endif; ?>
</div>
