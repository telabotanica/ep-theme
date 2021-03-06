
<?php get_header( 'buddypress' ); ?>

	<?php do_action( 'bp_before_directory_members_page' ); ?>

	<div id="content">
		<div class="padder">

		<?php do_action( 'bp_before_directory_members' ); ?>

		<form action="" method="post" id="members-directory-form" class="dir-form">
			
			<?php
			global $bp_members, $members_template;
			$bp_members = bp_has_members( bp_ajax_querystring( 'members' ) );
			?>

			<!--<p class="subtitle"><?php bp_members_pagination_count(); ?></p>-->

			<?php do_action( 'bp_before_directory_members_content' ); ?>

			<div class="item-list-tabs" id="subnav" role="navigation">
				<ul>

					<?php do_action( 'bp_members_directory_member_sub_types' ); ?>a>	
					
					<!-- Barre de recherche -->
					<?php bp_directory_members_search_form(); ?>
					
					<!--
					<li><a class="members-sort-link sort-active" href="#active"><?php _e( 'Last Active', 'huddle' ); ?></a></li>
					<li><a class="members-sort-link sort-newest" href="#newest"><?php _e( 'Newest Registered', 'huddle' ); ?></a></li>
					<li><a class="members-sort-link sort-alphabetical" href="#alphabetical"><?php _e( 'Alphabetical', 'huddle' ); ?></a></li>
					-->

					<li id="members-order-select" class="last filter">

						<label for="members-order-by"><?php _e( 'Order By:', 'huddle' ); ?></label>
						<select id="members-order-by">
							<option value="active"><?php _e( 'Last Active', 'huddle' ); ?></option>
							<option value="newest"><?php _e( 'Newest Registered', 'huddle' ); ?></option>

							<?php if ( bp_is_active( 'xprofile' ) ) : ?>

								<option value="alphabetical"><?php _e( 'Alphabetical', 'huddle' ); ?></option>

							<?php endif; ?>

							<?php do_action( 'bp_members_directory_order_options' ); ?>

						</select>
					</li>
				</ul>
			</div>

			<div id="members-dir-list" class="members dir-list">

				<?php locate_template( array( 'members/members-loop.php' ), true ); ?>

			</div><!-- #members-dir-list -->

			<div class="item-list-tabs for-bottom">
				<p class="pagination fl"><?php bp_members_pagination_links(); ?></p>
				<p class="pages-count fr"><?php printf( __( 'Page %d of %d', 'huddle' ), isset( $_GET['upage'] ) ? $_GET['upage'] : 1, ceil( $members_template->total_member_count / 14 ) ) ?></p>
			</div>

			<?php do_action( 'bp_directory_members_content' ); ?>

			<?php wp_nonce_field( 'directory_members', '_wpnonce-member-filter' ); ?>

			<?php do_action( 'bp_after_directory_members_content' ); ?>

		</form><!-- #members-directory-form -->

		<?php do_action( 'bp_after_directory_members' ); ?>

		</div><!-- .padder -->
	</div><!-- #content -->

	<?php do_action( 'bp_after_directory_members_page' ); ?>

<?php get_sidebar( 'buddypress' ); ?>
<?php get_footer( 'buddypress' ); ?>
