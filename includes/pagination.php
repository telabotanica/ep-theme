
	<?php if( $wp_query->max_num_pages > 1 ): ?>

		<div class="clear"></div>

		<div id="pagination">

			<?php if( function_exists( 'wp_pagenavi' ) ) { ?>

				<?php wp_pagenavi(); ?>

			<?php } else { ?>

				<div class="fl"><?php next_posts_link('<span>&larr; ' . __( 'Previous', 'huddle' ) . '</span>') ?></div>
				<div class="fr"><?php previous_posts_link('<span>' . __( 'Next', 'huddle' ) . ' &rarr;</span>') ?></div>

			<?php } ?>

		</div>

	<?php endif ?>
