<?php

do_action( 'bp_before_group_header' );

?>

<!-- Lien de retour -->
<div class="hide-responsive"><a class="lien-accueil" href="<?php echo trailingslashit( bp_get_root_domain() . '/' . bp_get_groups_root_slug() ); ?>">Revenir aux projets</a></div>
<div class="show-responsive"><a class="lien-accueil" href="<?php echo trailingslashit( bp_get_root_domain() . '/' . bp_get_groups_root_slug() ); ?>">Retour</a></div>



<!-- Avatar du projet -->
<div id="item-header-avatar">

	<a href="<?php bp_group_permalink(); ?>" title="<?php bp_group_name(); ?>">
		<?php bp_group_avatar(); ?>
	</a>
	
	<!-- Confidentialité du projet -->
	<div class="absolute highlight"><?php bp_group_type(); ?></div>
	
</div>


<!-- Contenu du header -->
<div id="item-header-content" class="hide-responsive">

	<!-- Titre du projet -->
	<h2><a href="<?php bp_group_permalink(); ?>" title="<?php bp_group_name(); ?>"><?php bp_group_name(); ?></a></h2>

	<!-- bouton d'adhésion / désadhésion -->
	<?php echo bp_get_group_join_button(); ?>
	
	<!-- Résumé du projet -->
	<span class="highlight" id="resume"><?php bp_group_description(); ?></span>
	
	<!-- Dernière activité sur le projet -->
	<span class="activity" id="activite"><?php printf( __( 'active %s', 'huddle' ), bp_get_group_last_active() ); ?></span>

	<?php do_action( 'bp_before_group_header_meta' ); ?>

</div>


<!-- Actions du header -->
<div id="item-actions" class="hide-responsive">

	<?php if ( bp_group_is_visible() ) : ?>
	
		<!-- Administrateurs du groupe -->
		<h3><?php _e( 'Group Admins', 'huddle' ); ?></h3>

		<ul id="group-admins">
			<?php
			global $groups_template;
			$group =& $groups_template->group;
			?>
			<?php foreach( (array) $group->admins as $admin ) { ?>
                <li>
                    <a href="<?php echo bp_core_get_user_domain( $admin->user_id, $admin->user_nicename, $admin->user_login ) ?>"><?php echo bp_core_fetch_avatar( array( 'item_id' => $admin->user_id, 'email' => $admin->user_email ) ) ?></a>
                    <div class="item-title">
						<a href="<?php echo bp_core_get_user_domain( $admin->user_id, $admin->user_nicename, $admin->user_login ) ?>"><?php echo get_user_meta( $admin->user_id, 'first_name', true ) . ' ' . get_user_meta( $admin->user_id, 'last_name', true ) ?></a>
					</div>
					<div class="item-meta"><span class="nickname"><?php echo get_user_meta( $admin->user_id, 'nickname', true ) ?></span></div>
                </li>
            <?php } ?>
		</ul>

		<?php
		do_action( 'bp_after_group_menu_admins' );

		if ( bp_group_has_moderators() ) :
			do_action( 'bp_before_group_menu_mods' ); ?>

			<h3><?php _e( 'Group Mods' , 'huddle' ) ?></h3>

			<?php bp_group_list_mods();

			do_action( 'bp_after_group_menu_mods' );

		endif;

	endif; ?>

</div>

<?php
do_action( 'bp_after_group_header' );
?>
