
<?php do_action( 'bp_before_groups_loop' ); ?>

<?php
global $huddle_bp_groups;
if( ! $huddle_bp_groups ) $huddle_bp_groups = bp_has_groups( bp_ajax_querystring( 'groups' ) );
$url = rtrim( current( explode( '?', $_SERVER['REQUEST_URI'] ) ), '/' );
?>

<?php if ( bp_has_groups( bp_ajax_querystring( 'groups' ) ) ) : ?>

	<?php do_action( 'bp_before_directory_groups_list' ); ?>
	
	<!-- Panneau latéral -->
	<div id="panneau-lateral">
	
	<div id="titre-panneau-lateral">Recherche avancée</div>
	<div id="masquer-panneau-lateral" class="pointer" title="Masquer la recherche avancée">X</div>
	
		<!-- Filtres -->
		<div class="tuile-options" id="panneau-filtres">
		
			<!-- Titre tri -->
			<div class="titre-options pointer">Trier par</div>
			
			<!-- Options tri -->
			<div class="wp-bootstrap contenu-options btn-group btn-group" role="group">
				
				<!-- Par activité -->
				<label for="activite" class="pointer">
					<button type="button" id="activite" class="btn btn-primary" value="active"><?php _e( 'Last Active', 'buddypress' ); ?></button>
				</label>
					
				<!-- Par popularité -->
				<label for="populaire" class="pointer">
					<button type="button" id="populaire" class="btn btn-primary" value="popular"><?php _e( 'Most Members', 'buddypress' ); ?></button>
				</label>
				
				<!-- Par date -->
				<label for="date" class="pointer">
					<button type="button" id="date" class="btn btn-primary" value="newest"><?php _e( 'Newly Created', 'buddypress' ); ?></button>
				</label>
				
				<!-- Par ordre alphabétique -->
				<label for="alphabetique" class="pointer">
					<button type="button" id="alphabetique" class="btn btn-primary" value="alphabetical"><?php _e( 'Alphabetical', 'buddypress' ); ?></button>
				</label>
				
				<?php do_action( 'bp_groups_directory_order_options' ); ?>	

					
			</div>
			
		</div>
		
		<!-- Catégories -->
		<div class="tuile-options" id="panneau-categories">
		
			<!-- Titre catégories -->
			<div class="titre-options pointer">Catégories</div>
		
			<!-- Options catégories -->
			<div class="wp-bootstrap contenu-options btn-group btn-group" role="group">
			
				<?php	
				/* Lecture de la table "wp_tb_categories_projets" */
				$requete = "
					SELECT * 
					FROM {$wpdb->prefix}tb_categories_projets
					WHERE id_categorie != 'Aucune catégorie'
					GROUP BY id_categorie
				";
				$res = $wpdb->get_results($requete) ;
			
				/* Construction de l'objet */
				foreach ($res as $meta) {	
				?>
				<label class="pointer">
					<button class="btn btn-primary"><?php echo $meta->nom_categorie ?></button>
				</label>
				<?php
				}
				?>
				
			</diV>
			
		</div>
		
		<!-- Etiquettes -->
		<div class="tuile-options" id="panneau-tags">
		
			<!-- Titre étiquettes -->
			<div class="titre-options pointer">Mots-clés</div>
			
			<!-- Options étiquettes -->
			<div class="wp-bootstrap contenu-options btn-group btn-group" role="group">
				<?php echo custom_gtags_show_tags_in_add_form(); ?>
			</div>
			
		</div>
	
	</div>

	<!-- Liste des projets -->
	<ul id="groups-list" class="item-list" role="main">
		
	<?php $i_row = 0; $i = 0; $i_column = 0; while ( bp_groups() ) : bp_the_group(); ?>
	
		<!-- Projet -->
		<li class="tuile-projet">
			
			<a href="<?php bp_group_permalink(); ?>">
				
				<!-- Avatar du projet -->
				<div class="avatar-projet">
					<?php bp_group_avatar(); ?>
				</div>
			
				<!-- Titre du projet -->
				<div class="titre-projet">
					<?php bp_group_name(); ?>
				</div>
				
			</a>
			
			<!-- Meta-données du projet -->
			<div class="details-projet">
				<div class="confidentialite-projet"><?php bp_group_type(); ?></div>
				<div class="membres-projet"><?php bp_group_member_count(); ?></div>
				<div class="activite-projet"><?php printf( __( 'active %s', 'huddle' ), bp_get_group_last_active() ); ?></div>
				<div class="resume-projet"><?php bp_group_description(); ?></div>
				<?php do_action( 'bp_directory_groups_item' ); ?>
			</div>
			
		</li>
			
		
		
	<?php endwhile; ?>
	</ul>

	<?php do_action( 'bp_after_directory_groups_list' ); ?>

	<div id="pag-bottom" class="pagination">

		<div class="pag-count" id="group-dir-count-bottom">

			<?php bp_groups_pagination_count(); ?>

		</div>

		<div class="pagination-links" id="group-dir-pag-bottom">

			<?php bp_groups_pagination_links(); ?>

		</div>

	</div>
	

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'There were no groups found.', 'buddypress' ); ?></p>
	</div>

<?php endif; ?>

<?php do_action( 'bp_after_groups_loop' ); ?>
