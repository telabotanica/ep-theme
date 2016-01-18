
<?php get_header( 'buddypress' ); ?>

	<?php do_action( 'bp_before_directory_blogs_page' ); ?>

	<div id="content">
		<div class="padder">

		<?php do_action( 'bp_before_directory_blogs' ); ?>

		<form action="" method="post" id="blogs-directory-form" class="dir-form">

			<?php
			global $bp_blogs, $blogs_template;
			$bp_blogs = bp_has_blogs( bp_ajax_querystring( 'blogs' ) );
			$max_pages = max( ceil( $blogs_template->total_blog_count / 14 ), 1 );
			?>

			<h3><?php _e( 'Site Directory', 'huddle' ); ?></h3>
			<p class="subtitle">
				<?php bp_blogs_pagination_count(); ?>
				<?php if ( is_user_logged_in() && bp_blog_signup_enabled() ) : ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn-gray quick-create-blog" href="<?php echo add_query_arg( 'w-iframe', '1', bp_get_root_domain() . '/' . bp_get_blogs_slug() . '/create/' ) ?>"><?php _e( 'Create a Blog', 'huddle' ); ?></a><?php endif; ?>
			</p>

			<?php do_action( 'bp_before_directory_blogs_content' ); ?>

			<div id="blog-dir-search" class="dir-search" role="search">

				<?php bp_directory_blogs_search_form(); ?>

			</div><!-- #blog-dir-search -->

			<div class="item-list-tabs" id="subnav" role="navigation">
				<ul>

					<?php do_action( 'bp_blogs_directory_blog_sub_types' ); ?>

					<li><a class="blogs-sort-link sort-active" href="#active"><?php _e( 'Last Active', 'huddle' ) ?></a></li>
					<li><a class="blogs-sort-link sort-newest" href="#newest"><?php _e( 'Newly Created', 'huddle' ) ?></a></li>
					<li><a class="blogs-sort-link sort-alphabetical" href="#alphabetical"><?php _e( 'Alphabetical', 'huddle' ) ?></a></li>

					<li id="blogs-order-select" class="last filter">

						<label for="blogs-order-by"><?php _e( 'Order By:', 'huddle' ); ?></label>
						<select id="blogs-order-by">
							<option value="active"><?php _e( 'Last Active', 'huddle' ); ?></option>
							<option value="newest"><?php _e( 'Newest', 'huddle' ); ?></option>
							<option value="alphabetical"><?php _e( 'Alphabetical', 'huddle' ); ?></option>

							<?php do_action( 'bp_blogs_directory_order_options' ); ?>

						</select>
					</li>
				</ul>
			</div>

			<div id="blogs-dir-list" class="blogs dir-list">

				<?php locate_template( array( 'blogs/blogs-loop.php' ), true ); ?>

			</div><!-- #blogs-dir-list -->

			<div class="item-list-tabs for-bottom">
				<p class="pagination fl"><?php bp_blogs_pagination_links(); ?></p>
				<p class="pages-count fr"><?php printf( __( 'Page %d of %d', 'huddle' ), isset( $_GET['upage'] ) ? $_GET['upage'] : 1, $max_pages ) ?></p>
			</div>

			<?php do_action( 'bp_directory_blogs_content' ); ?>

			<?php wp_nonce_field( 'directory_blogs', '_wpnonce-blogs-filter' ); ?>

			<?php do_action( 'bp_after_directory_blogs_content' ); ?>

		</form><!-- #blogs-directory-form -->

		<?php do_action( 'bp_after_directory_blogs' ); ?>

		</div><!-- .padder -->
	</div><!-- #content -->

	<?php do_action( 'bp_after_directory_blogs_page' ); ?>

<?php get_sidebar( 'buddypress' ); ?>
<?php get_footer( 'buddypress' ); ?>
