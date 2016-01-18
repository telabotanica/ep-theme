
	<?php get_header(); ?>

		<div id="main">

			<?php do_action( 'bp_before_blog_single_post' ) ?>

			<?php load_template( TEMPLATEPATH . '/includes/loop.php' ) ?>

			<?php do_action( 'bp_after_blog_single_post' ) ?>

		</div><!-- #main -->

	<?php get_sidebar(); ?>

	<?php get_footer(); ?>
