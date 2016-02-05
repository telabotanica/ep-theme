
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
						<a href="<?php echo get_option('home'); ?>" class="lien-accueil">Revenir à l'accueil</a>
										
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

					<?php locate_template( array( 'groups/groups-loop.php' ), true ); ?>

				</div><!-- #groups-dir-list -->

				<?php do_action( 'bp_directory_groups_content' ); ?>

				<?php wp_nonce_field( 'directory_groups', '_wpnonce-groups-filter' ); ?>

				<?php do_action( 'bp_after_directory_groups_content' ); ?>

			</form><!-- #groups-directory-form -->
		
			<!-- Tuile création projet -->
			<div id="conteneur-creation-projet">
				<a href="create">
					<div id="tuile-creation-projet">Créer un nouveau projet</div>
				</a>
			</div>

			<?php do_action( 'bp_after_directory_groups' ); ?>
			
			<!-- Retour haut de page -->
			<a href="#subnav" class="retour-haut-page show-responsive" title="Revenir en haut de la page">&#9650;</a>

		</div><!-- .padder -->
	</div><!-- #content -->

	<?php do_action( 'bp_after_directory_groups_page' ); ?>

<?php get_sidebar( 'buddypress' ); ?>
<?php get_footer( 'buddypress' ); ?>

