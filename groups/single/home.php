<?php get_header( 'buddypress' ); ?>

	<script type="text/javascript">
	if ( top.location != self.location ) top.location = self.location.href;
	</script>

	<div id="content">
		<div class="padder">
		
			<?php if ( bp_has_groups() ) : while ( bp_groups() ) : bp_the_group(); ?>

			<?php do_action( 'bp_before_group_home_content' ) ?>

			<div id="item-header" role="complementary">

				<?php locate_template( array( 'groups/single/group-header.php' ), true ); ?>

			</div>
			
			<div id="item-nav">
				<div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
					<ul>

						<?php bp_get_options_nav(); ?>

						<?php do_action( 'bp_group_options_nav' ); ?>
						
					</ul>
				</div>
			</div>

			<div id="item-body">
				<?php do_action( 'bp_before_group_body' );
				
				/* Onglet Réglages */
				if ( bp_is_group_admin_page() && bp_group_is_visible() ) :
					locate_template( array( 'groups/single/admin.php' ), true );

				/* Onglet Accueil => utilise le template "front" pour l'instant */
				/*elseif ( bp_is_group_home() && bp_group_is_visible() ) :
					echo "coucou";
					//locate_template( array( 'groups/single/description.php' ), true );*/

				/* Onglet Membres */
				elseif ( bp_is_group_members() && bp_group_is_visible() ) :
					locate_template( array( 'groups/single/members.php' ), true );
					
				/* Onglet Activité */
				elseif ( bp_is_group_activity() ) :
   					locate_template( array( 'groups/single/activity.php' ), true );

				elseif ( bp_is_group_invites() && bp_group_is_visible() ) :
					locate_template( array( 'groups/single/send-invites.php' ), true );
				
				/* Onglet Forum */
				elseif ( bp_is_group_forum() && bp_group_is_visible() && bp_is_active( 'forums' ) && bp_forums_is_installed_correctly() ) :
					locate_template( array( 'groups/single/forum.php' ), true );

				elseif ( bp_is_group_membership_request() ) :
					locate_template( array( 'groups/single/request-membership.php' ), true );

				

				elseif ( !bp_group_is_visible() ) :
					// The group is not visible, show the status message

					do_action( 'bp_before_group_status_message' ); ?>

					<div id="message" class="info">
						<p>
							<?php //bp_group_status_message(); ?>
							Ce projet est privé.
						</p>
						<?php if (is_user_logged_in()): ?>
						<p>
							Pour y participer, vous devez faire une demande d'adhésion en
							cliquant sur "adhérer à ce projet".
						</p>
						<?php else: ?>
						<p>
							Pour y participer, vous devez être identifié avec votre compte Tela Botanica.
							<br/>
							Pour vous identifier, utilisez le bouton "connexion" en haut à droite de la page.
							<br/>
							(vous n'avez pas encore de compte ?
							<a href="http://www.tela-botanica.org/incsription" target="_blank">Créez-en un ici</a>)
						</p>
						<?php endif; ?>
					</div>

					<?php do_action( 'bp_after_group_status_message' );

				else :
					// If nothing sticks, just load a group front template if one exists.
					locate_template( array( 'groups/single/front.php' ), true );

				endif;

				do_action( 'bp_after_group_body' ); ?>

			</div>
			

			<?php do_action( 'bp_after_group_home_content' ); ?>

			<?php endwhile; endif; ?>

		</div>
		
	</div>

<?php get_sidebar( 'buddypress' ); ?>
<?php get_footer( 'buddypress' ); ?>
