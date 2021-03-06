
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

				<!-- Header -->
				<div class="item-list-tabs" id="subnav" role="navigation">
				
					<ul>

						<?php do_action( 'bp_groups_directory_group_types' ); ?>
					
						<!-- Retour à l'accueil de l'espace projets -->
						<a href="<?php echo trailingslashit( bp_get_root_domain() ); ?>" class="lien-accueil">Revenir à l'accueil</a>
										
						<!-- Barre de recherche -->
						<?php bp_directory_groups_search_form() ?>
					
					</ul>
				
					<!-- Pagination -->
					<div class="item-list-tabs for-bottom">
				
						<div class="pagination center bold">
						<?php 
							if ($groups_template->total_group_count > 12) {
								bp_groups_pagination_links();
							}
							echo $groups_template->total_group_count;
							if ($groups_template->total_group_count == 1) {
								echo ' projet trouvé';
							}
							else {
								echo ' projets trouvés';
							}
						?>
						</div>
						 
					</div>
				
					<!-- Afficher volet -->
					<div id="afficher-panneau-lateral" class="pointer show-responsive">Recherche avancée</div>
			
				</div>
			
				<!-- Liste des groupes -->
				<div id="groups-dir-list" class="groups dir-list">

					<?php locate_template( array( 'groups/liste-projets.php' ), true ); ?>

				</div><!-- #groups-dir-list -->

				<?php do_action( 'bp_directory_groups_content' ); ?>

				<?php wp_nonce_field( 'directory_groups', '_wpnonce-groups-filter' ); ?>

				<?php do_action( 'bp_after_directory_groups_content' ); ?>

			</form>

			<!-- Tuile création projet -->
			<?php if ( is_user_logged_in() && bp_user_can_create_groups() ) { ?>
				<a href="<?php echo trailingslashit( bp_get_root_domain() . '/' . bp_get_groups_root_slug() . '/create' ); ?>">
					<div id="tuile-creation-projet">Créer un nouveau projet</div>
				</a>
			<?php } ?>

			<?php do_action( 'bp_after_directory_groups' ); ?>

		</div>
	</div>

	<?php do_action( 'bp_after_directory_groups_page' ); ?>

<?php get_sidebar( 'buddypress' ); ?>
<?php get_footer( 'buddypress' ); ?>

