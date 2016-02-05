
<?php do_action( 'bp_before_member_header' ); ?>

<div id="item-header-avatar">
	<a href="<?php bp_user_link(); ?>">

		<?php bp_displayed_user_avatar( 'type=full' ); ?>

	</a>
</div><!-- #item-header-avatar -->

	<?php global $bp; ?>

<div id="item-header-content">

	<h2>
		<a href="<?php bp_displayed_user_link(); ?>"><?php bp_displayed_user_fullname(); ?></a>
	</h2>

	<span class="user-nicename">@<?php bp_displayed_user_username(); ?></span>
	<span class="activity"><?php bp_last_activity( bp_displayed_user_id() ); ?></span>

	<?php do_action( 'bp_before_member_header_meta' ); ?>

	<div id="item-meta">

		<?php if ( bp_is_active( 'activity' ) ) : ?>

			<div id="latest-update">

				<?php bp_activity_latest_update( bp_displayed_user_id() ); ?>

			</div>

		<?php endif; ?>

		<div id="item-buttons">

			<?php do_action( 'bp_member_header_actions' ); ?>

		</div><!-- #item-buttons -->

		<?php
		/***
		 * If you'd like to show specific profile fields here use:
		 * bp_profile_field_data( 'field=About Me' ); -- Pass the name of the field
		 */
		 do_action( 'bp_profile_header_meta' );

		 ?>

	</div><!-- #item-meta -->

	<?php if( is_user_logged_in() && $bp->loggedin_user->id != $bp->displayed_user->id ) : ?>
		<br />
		<p><a href="<?php echo $bp->loggedin_user->domain ?>messages/compose/?to=<?php echo $bp->displayed_user->userdata->user_login ?>" class="btn-gray"><?php _e( 'Message User', 'huddle' ) ?></a></p>

 	<?php endif ?>

</div><!-- #item-header-content -->

<div id="item-actions">

	<?php if( is_user_logged_in() && $bp->loggedin_user->id == $bp->displayed_user->id ) : ?>

		<p><a href="<?php bp_displayed_user_link(); ?>profile/edit"><?php _e( 'Edit Profile', 'huddle' ) ?></a></p>
 		<p><a href="<?php bp_displayed_user_link(); ?>settings"><?php _e( 'Account Settings', 'huddle' ) ?></a></p>

 	<?php elseif( is_user_logged_in() ) : ?>
 		
 		<?php do_action( 'bp_directory_members_actions' ); ?>

 	<?php endif ?>

	<?php do_action( 'bp_member_header_actions' ); ?>

</div><!-- #item-actions -->

<?php do_action( 'bp_after_member_header' ); ?>

<?php do_action( 'template_notices' ); ?>