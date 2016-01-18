<?php

do_action( 'bp_before_group_header' );

?>

<a class="lien-accueil" href="<?php echo get_option('home'); ?>">
	Retour à l'accueil
</a>

<div id="item-header-avatar">
	<a href="<?php bp_group_permalink(); ?>" title="<?php bp_group_name(); ?>">

		<?php bp_group_avatar(); ?>

	</a>
</div><!-- #item-header-avatar -->

<div id="item-header-content">
	<h2><a href="<?php bp_group_permalink(); ?>" title="<?php bp_group_name(); ?>"><?php bp_group_name(); ?></a></h2>
	<span class="highlight"><?php bp_group_type(); ?></span> <span class="activity"><?php printf( __( 'active %s', 'huddle' ), bp_get_group_last_active() ); ?></span>

	<?php do_action( 'bp_before_group_header_meta' ); ?>

</div><!-- #item-header-content -->

<div id="item-actions">

	<?php if ( bp_group_is_visible() ) : ?>

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

</div><!-- #item-actions -->

<?php
do_action( 'bp_after_group_header' );
?>
