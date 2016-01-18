<?php
/*
Template Name: Page d'accueil
*/

get_header(); ?>
<div id="page-accueil">

	<div id="primary" class="content-area">
	
		<div id="content" class="site-content" role="main">
			
			<!-- Bandeau -->				
			<div id="tb-zone-bandeau">
				
				<!-- Partie gauche -->
				<div class="tb-bandeau">
					<div class="tb-conteneur-bandeau">
						<div class="tb-bandeau-titre">Nos projets</div>
						<div class="tb-bandeau-sstitre">Découvrez les projets de Tela-Botanica</div>
						<hr>
						<!-- 1ère colonne -->
						<ul class="gauche">
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
						<ul class="droite">
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
				<div class="tb-bandeau">
					<div class="tb-conteneur-bandeau">
						<div class="tb-bandeau-titre">Vos projets</div>
						<div class="tb-bandeau-sstitre">Créez, participez, faites-vous plaiz' les caillera</div>
						<hr>
						<!-- 1ère colonne -->
						<ul class="gauche">
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
						<ul class="droite">
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
				<div id="tb-recherche-projet">
					<!-- Barre de recherche -->
					<label class="pointer" for="groups_search">
						<h3>Je cherche un projet existant</h3>
					</label>
					<!-- Liste des projets -->
					<?php bp_directory_groups_search_form() ?>
					<a href="groups">Accéder à la liste complète des projets</a>
				</div>
			
				<!-- Création projet -->
				<?php if ( is_user_logged_in() && bp_user_can_create_groups() ) { ?>
				
				<!-- Si l'utilisateur est connecté, il a accès au formulaire de création d'un projet -->
				<a id="tb-creation-projet" href="<?php echo trailingslashit( bp_get_root_domain() . '/' . bp_get_groups_root_slug() . '/create' ); ?>">
					<h3>Je crée mon projet</h3>
				</a>
				
				<!-- S'il n'est pas connecté, il a accès au formulaire de connexion/inscription -->
				<?php } else { ?>
				<a id="tb-creation-projet" href="wp-login.php">
					<h3>Connectez-vous pour créer votre projet</h3>
				</a>
				<?php } ?>
				
								
			</div>
			

			
			<!-- Zone des articles -->
			<div id="tb-zone-articles">
			
				<?php
					$articlesRecents = new WP_Query();
					$articlesRecents->query('showposts=5');
				?>

				<?php while ($articlesRecents->have_posts()) : $articlesRecents->the_post(); ?>
				
				<!-- Article -->
				<div class="gauche post<?php sticky_class(); ?>" id="post-<?php the_ID(); ?>">
				
					<!-- Titre de l'article -->
					<div class="tb-article-titre">
						<?php if (is_sticky($post_ID)) { ?>
						Article épinglé - 
						<?php } ?>
						<?php the_title(); ?>
						
						<span class="tb-article-date">
							Dernière modification le <?php the_time('j F Y'); ?> à <?php the_time('H:i'); ?> par <?php the_author_posts_link(); ?>
						</span>
					</div>
					
					<!-- Contenu de l'article -->
					<div class="tb-article-contenu">
						<?php the_content(); ?>
					</div>
					
					<div class="clear"></div>
					
				</div>
				
				<div class="clear"></div>
				
				<?php endwhile; ?>
				
			</div>
			





		</div>
		
	</div>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
