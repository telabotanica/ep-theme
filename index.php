
	<?php get_header(); ?>

		<div id="main">

			<?php do_action( 'bp_before_blog_home' ) ?>

			<?php do_action( 'template_notices' ) ?>

			<?php load_template( TEMPLATEPATH . '/includes/loop.php' ) ?>

			<?php do_action( 'bp_after_blog_home' ) ?>

		</div><!-- #main -->

	<?php if( ! isset( $_GET['w-iframe'] ) ) get_sidebar(); ?>

	<?php get_footer(); ?>
