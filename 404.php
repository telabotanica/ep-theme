
	<?php get_header(); ?>

		<div id="main">

			<?php do_action( 'bp_before_404' ); ?>

			<div class="post page-404 error404 not-found" id="post-0">
				<h2 class="post-title page-title"><?php _e( "Page not found", 'huddle' ); ?></h2>

				<div class="post-content">
					<p><?php _e( "We're sorry, but we can't find the page that you're looking for.", 'huddle' ); ?></p>
				</div>

				<?php do_action( 'bp_404' ); ?>
			</div><!--post-->

			<?php do_action( 'bp_after_404' ) ?>

		</div><!-- #main -->

	<?php get_sidebar('page'); ?>

	<?php get_footer(); ?>
