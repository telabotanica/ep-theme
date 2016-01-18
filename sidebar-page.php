
<?php if( ! substr_count( $_SERVER['REQUEST_URI'], '/' . bp_get_members_root_slug() ) && ! substr_count( $_SERVER['REQUEST_URI'], '/' . bp_get_groups_root_slug() ) && ! in_array( 'bp-profile', apply_filters( 'body_class', 'a-class' ) ) && ! in_array( 'bp-plugin', apply_filters( 'body_class', 'a-class' ) ) ) : ?>

		<div id="sidebar-page">

			<?php dynamic_sidebar( 'sidebar-page' ) ?>

		</div><!-- #sidebar-page -->

	<?php endif ?>