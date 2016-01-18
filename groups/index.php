
<?php get_header( 'buddypress' ); ?>

	<?php do_action( 'bp_before_directory_groups_page' ); ?>

	<div id="content">
		<div class="padder">

		<?php do_action( 'bp_before_directory_groups' ); ?>

		<form action="" method="post" id="groups-directory-form" class="dir-form">

			<?php
			global $huddle_bp_groups, $groups_template;
			$huddle_bp_groups = bp_has_groups( bp_ajax_querystring( 'groups' ) );
			?>

			<?php do_action( 'bp_before_directory_groups_content' ); ?>

			

			<?php do_action( 'template_notices' ); ?>

			<div class="item-list-tabs" id="subnav" role="navigation">
				<ul>

					<?php do_action( 'bp_groups_directory_group_types' ); ?>
					
					<!-- Retour à l'accueil de l'espace projets -->
					<a href="<?php echo get_option('home'); ?>" class="lien-accueil">Retour à l'accueil</a>
										
					<!-- Barre de recherche -->
					<?php bp_directory_groups_search_form() ?>
					
					<!-- Tri des projets -->
					<li id="groups-order-select" class="last filter">
						<label for="groups-order-by"><?php _e( 'Order By:', 'huddle' ); ?></label>
						<select id="groups-order-by">
							<option value="active"><?php _e( 'Last Active', 'huddle' ); ?></option>
							<option value="popular"><?php _e( 'Most Members', 'huddle' ); ?></option>
							<option value="newest"><?php _e( 'Newly Created', 'huddle' ); ?></option>
							<option value="alphabetical"><?php _e( 'Alphabetical', 'huddle' ); ?></option>
							<?php do_action( 'bp_groups_directory_order_options' ); ?>
						</select>
					</li>
					
				</ul>
			</div>

			<div id="groups-dir-list" class="groups dir-list">

				<?php locate_template( array( 'groups/groups-loop.php' ), true ); ?>

			</div><!-- #groups-dir-list -->

			<div class="item-list-tabs for-bottom">
				<p class="pagination fl"><?php bp_groups_pagination_links(); ?></p>
				<p class="pages-count fr"><?php printf( __( 'Page %d of %d', 'huddle' ), isset( $_GET['upage'] ) ? $_GET['upage'] : 1, ceil( $groups_template->total_group_count / 12 ) ) ?></p>
			</div>

			<?php do_action( 'bp_directory_groups_content' ); ?>

			<?php wp_nonce_field( 'directory_groups', '_wpnonce-groups-filter' ); ?>

			<?php do_action( 'bp_after_directory_groups_content' ); ?>

		</form><!-- #groups-directory-form -->

		<?php do_action( 'bp_after_directory_groups' ); ?>

		</div><!-- .padder -->
	</div><!-- #content -->

	<?php do_action( 'bp_after_directory_groups_page' ); ?>

<?php get_sidebar( 'buddypress' ); ?>
<?php get_footer( 'buddypress' ); ?>

