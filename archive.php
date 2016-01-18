
	<?php get_header(); ?>

		<div id="main">

			<?php do_action( 'bp_before_archive' ) ?>

			<div class="blog-heading">
				<?php if ( is_day() ) : ?>
					<em class="fr"><?php _e('Daily Archives', 'huddle'); ?></em>
					<h3 class="fl"><?php printf( __( '%s', 'huddle' ), get_the_date() ); ?></h3>
				<?php elseif ( is_month() ) : ?>
					<em class="fr"><?php _e('Monthly Archives', 'huddle'); ?></em>
					<h3 class="fl"><?php printf( __( '%s', 'huddle' ), get_the_date('F Y') ); ?></h3>
				<?php elseif ( is_year() ) : ?>
					<em class="fr"><?php _e('Yearly Archives', 'huddle'); ?></em>
					<h3 class="fl"><?php printf( __( '%s', 'huddle' ), get_the_date('Y') ); ?></h3>
				<?php elseif ( is_category() ) : ?>
					<em class="fr"><?php _e('Category', 'huddle'); ?></em>
					<h3 class="fl"><?php single_cat_title(); ?></h3>
				<?php elseif ( is_tag() ) : ?>
					<em class="fr"><?php _e('Tag', 'huddle'); ?></em>
					<h3 class="fl"><?php single_tag_title(); ?></h3>
				<?php elseif ( is_author() ) : ?>
					<?php $curauth = $wp_query->get_queried_object() ?>
					<h3 class="fl"><?php echo $curauth->display_name; ?></h3>
					<em class="fr"><?php _e('Author', 'huddle'); ?></em>
				<?php else : ?>
					<em class="fr"><?php _e('Blog Archives', 'huddle'); ?></em>
					<h3 class="fl"><?php printf( __( '%s', 'huddle' ), get_the_date() ); ?></h3>
				<?php endif; ?>

				<div class="clear"></div>
			</div><!--.blog-heading-->

			<?php // Include the WordPress loop file
			load_template( TEMPLATEPATH . '/includes/loop.php' );
			?>

			<?php do_action( 'bp_after_archive' ) ?>

		</div><!--#main-->

	<?php get_sidebar(); ?>

	<?php get_footer(); ?>
