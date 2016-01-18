
	<?php get_header(); ?>

		<div id="main">

			<?php do_action( 'bp_before_blog_search' ) ?>

			<div class="blog-heading">
				<em class="fr"><?php _e('Search Results', 'huddle'); ?></em>
				<h3 class="fl"><?php printf( __( '"%s"', 'huddle' ), get_search_query() ); ?></h3>

				<div class="clear"></div>
			</div><!--.blog-heading-->

			<?php // Include the WordPress loop file
			load_template( TEMPLATEPATH . '/includes/loop.php' );
			?>

			<?php do_action( 'bp_after_blog_search' ) ?>

		</div><!--#main-->

	<?php get_sidebar(); ?>
	
	<?php get_footer(); ?>
