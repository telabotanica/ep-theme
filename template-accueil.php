<?php
/*
Template Name: Page d'accueil
*/

get_header(); ?>
<div id="page-accueil">

	<div id="primary" class="content-area">
	
		<div id="content" class="site-content" role="main">
			
			<!-- Bandeau -->				
			<div id="tb-zone-bandeau" class="hide-responsive">
				
				<!-- Partie gauche -->
				<div class="tb-bandeau hide-responsive">
					<div class="tb-conteneur-bandeau">
						<div class="tb-bandeau-titre">Nos projets</div>
						<div class="tb-bandeau-sstitre">Découvrez les projets de Tela-Botanica</div>
						<hr>
						<!-- 1ère colonne -->
						<ul class="fl">
							<li>
								> <a href="#">Flora Data</a>
							</li>
							<li>
								> <a href="#">Sauvages de ma rue</a>
							</li>
							<li>
								> <a href="#">Observatoires des saisons</a>
							</li>
						</ul>
						<!-- 2ème clonne -->
						<ul class="fr">
							<li>
								> <a href="#">Les Herbonautes</a>
							</li>
							<li>
								> <a href="#">Vigie Flore</a>
							</li>
							<li>
								> <a href="#">Mission Flore</a>
							</li>
						</ul>
						<div class="clear"></div>
					</div>
				</div>
				
				<!-- Partie droite -->
				<div class="tb-bandeau hide-responsive">
					<div class="tb-conteneur-bandeau">
						<!-- Titre -->
						<div class="tb-bandeau-titre">Vos projets</div>
						<!-- Sous-titre -->
						<div class="tb-bandeau-sstitre">Créez, participez, partagez vos connaissances</div>
						<hr>
						<!-- 1ère colonne -->
						<ul class="fl">
							<li>
								> <a href="groups">Rechercher un projet</a>
							</li>
							<li>
								> <a href="#">Rejoindre un projet</a>
							</li>
							<li>
								> <a href="#">Créer un projet</a>
							</li>
						</ul>
						<!-- 2ème colonne -->
						<ul class="fr">
							<li>
								> <a href="#">Des outils à votre disposition</a>
							</li>
							<li>
								> <a href="#">Blablablabla</a>
							</li>
							<li>
								> <a href="#">FAQ</a>
							</li>
						</ul>
					</div>
				</div>
				
			</div>
			
			<!-- Projets -->
			<div id="tb-zone-projets">		
				
				<!-- Accès aux projets existants -->
				<div class="tb-encart-projet" id="tb-recherche-projet">
					<!-- Barre de recherche -->
					<?php bp_surcharge_directory_groups_search_form('groups') ?>
				</div>
			
				<!-- Création projet -->
				<?php if ( is_user_logged_in() && bp_user_can_create_groups() ) { ?>
				
				<!-- Si l'utilisateur est connecté, il a accès au formulaire de création d'un projet -->
				<a class="tb-encart-projet" id="tb-creation-projet" href="<?php echo trailingslashit( bp_get_root_domain() . '/' . bp_get_groups_root_slug() . '/create' ); ?>">
					<input class="hide-responsive custom_groups_search_submit" value="Je crée mon projet" />
					<input class="show-responsive custom_groups_search_submit" value="Création" />
				</a>
				
				<!-- S'il n'est pas connecté, il a accès au formulaire de connexion/inscription -->
				<?php } else { ?>
				<a class="tb-encart-projet" id="tb-creation-projet" href="wp-login.php">
					<input class="hide-responsive custom_groups_search_submit" value="Je me connecte" />
					<input class="show-responsive custom_groups_search_submit" value="Connexion" />
				</a>
				
				<?php } ?>
								
			</div>
			
			<?php
				$articlesRecents = new WP_Query();
				$articlesRecents->query('showposts=5');
				$totalProjets = groups_get_total_group_count();
				//if ( $articlesRecents->have_posts() && $totalProjets == 0 ) {
			?>
			
			<!-- Projets populaires -->
			<div id="tb-zone-projets-populaires">
				<?php include('groups/last-groups.php'); ?>
			</div>	
			
			<!-- Zone des articles -->
			<div id="tb-zone-articles">

				<?php while ($articlesRecents->have_posts()) : $articlesRecents->the_post(); ?>
				
				<!-- Article -->
				<div class="post<?php sticky_class(); ?>" id="post-<?php the_ID(); ?>">
				
					<!-- Titre de l'article -->
					<div class="tb-article-titre">
						<?php if (is_sticky($post_ID)) { ?>
						Article épinglé - 
						<?php } ?>
						<?php the_title(); ?>
					</div>
					
					<!-- Contenu de l'article -->
					<div class="tb-article-contenu">
						<?php the_content(); ?>
					</div>
					
					<!-- Date de la dernière modification -->
					<span class="tb-article-date">
						Dernière modification le <?php the_time('j F Y'); ?> à <?php the_time('H:i'); ?> par <?php the_author_posts_link(); ?>
					</span>
					
				</div>
				
				<?php endwhile; ?>
				
			</div>
			

		</div>
		
	</div>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
