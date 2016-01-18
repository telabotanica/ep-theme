
<?php get_header( 'buddypress' ); ?>

	<?php do_action( 'bp_before_directory_forums_page' ); ?>

	<?php do_action( 'bp_before_directory_forums' ); ?>

	<?php
	global $bp_forum_topics;
	$bp_forum_topics = bp_has_forum_topics( bp_ajax_querystring( 'forums' ) );
	?>

	<form action="" method="post" id="forums-search-form" class="dir-form">

		<h3><?php _e( 'Forums Directory', 'huddle' ); ?></h3>
		<p class="subtitle">
			<?php bp_forum_pagination_count(); ?>
			<?php if ( is_user_logged_in() ) : ?> &nbsp;<a class="button btn-gray show-hide-new" href="#new-topic" id="new-topic-button"><?php _e( 'New Topic', 'huddle' ); ?></a><?php endif; ?>
		</p>

		<?php do_action( 'bp_before_directory_forums_content' ); ?>

		<div id="forums-dir-search" class="dir-search" role="search">

			<?php bp_directory_forums_search_form(); ?>

		</div>
	</form>


	<?php do_action( 'bp_before_topics' ); ?>

	<form action="" method="post" id="forums-directory-form" class="dir-form">

		<div class="forums-nav item-list-tabs" role="navigation">
			<ul>
				<li class="selected" id="forums-all"><a href="<?php echo trailingslashit( bp_get_root_domain() . '/' . bp_get_forums_root_slug() ); ?>"><?php printf( __( 'All Topics <span>%s</span>', 'huddle' ), bp_get_forum_topic_count() ); ?></a></li>

				<?php if ( is_user_logged_in() && bp_get_forum_topic_count_for_user( bp_loggedin_user_id() ) ) : ?>

					<li id="forums-personal"><a href="<?php echo trailingslashit( bp_loggedin_user_domain() . bp_get_forums_slug() . '/topics' ); ?>"><?php printf( __( 'My Topics <span>%s</span>', 'huddle' ), bp_get_forum_topic_count_for_user( bp_loggedin_user_id() ) ); ?></a></li>

				<?php endif; ?>

				<?php do_action( 'bp_forums_directory_group_types' ); ?>

				<?php if ( is_user_logged_in() ) : ?>
					<li><a class="button show-hide-new" href="#new-topic" id="new-topic-button"><?php _e( 'New Topic', 'huddle' ); ?></a></li>
				<?php endif; ?>

				<?php do_action( 'bp_forums_directory_group_sub_types' ); ?>

				<li id="forums-order-select" class="last filter">

					<label for="forums-order-by"><?php _e( 'Order By:', 'huddle' ); ?></label>
					<select id="forums-order-by">
						<option value="active"><?php _e( 'Last Active', 'huddle' ); ?></option>
						<option value="popular"><?php _e( 'Most Posts', 'huddle' ); ?></option>
						<option value="unreplied"><?php _e( 'Unreplied', 'huddle' ); ?></option>

						<?php do_action( 'bp_forums_directory_order_options' ); ?>

					</select>
				</li>

			</ul>
		</div>

		<div id="forums-dir-list" class="forums dir-list" role="main">

			<?php locate_template( array( 'forums/forums-loop.php' ), true ); ?>

		</div>

		<?php do_action( 'bp_directory_forums_content' ); ?>

		<?php wp_nonce_field( 'directory_forums', '_wpnonce-forums-filter' ); ?>

	</form>

	<?php do_action( 'bp_after_directory_forums' ); ?>

	<?php do_action( 'bp_before_new_topic_form' ); ?>

	<div id="new-topic-post" class="message-box">

		<?php if ( is_user_logged_in() ) : ?>

			<?php if ( bp_is_active( 'groups' ) && bp_has_groups( 'user_id=' . bp_loggedin_user_id() . '&type=alphabetical&max=100&per_page=100' ) ) : ?>

				<form action="" method="post" id="forum-topic-form" class="standard-form">

					<?php do_action( 'groups_forum_new_topic_before' ) ?>

					<a name="post-new"></a>
					<h5><?php _e( 'Create New Topic:', 'huddle' ); ?></h5>
					<br />

					<?php do_action( 'template_notices' ); ?>

					<p class="editfield">
						<label><?php _e( 'Title:', 'huddle' ); ?></label>
						<input type="text" name="topic_title" id="topic_title" value="" />
					</p>

					<p class="editfield">
						<label><?php _e( 'Content:', 'huddle' ); ?></label>
						<textarea name="topic_text" rows="5" cols="31" id="topic_text"></textarea>
					</p>

					<p class="editfield">
						<label><?php _e( 'Tags (comma separated):', 'huddle' ); ?></label>
						<input type="text" name="topic_tags" id="topic_tags" value="" />
					</p>

					<p class="editfield">
						<label><?php _e( 'Post In Group Forum:', 'huddle' ); ?></label>
						<select id="topic_group_id" name="topic_group_id">

							<option value=""><?php /* translators: no option picked in select box */ _e( '----', 'huddle' ); ?></option>

							<?php while ( bp_groups() ) : bp_the_group(); ?>

								<?php if ( bp_group_is_forum_enabled() && ( is_super_admin() || 'public' == bp_get_group_status() || bp_group_is_member() ) ) : ?>

									<option value="<?php bp_group_id(); ?>"><?php bp_group_name(); ?></option>

								<?php endif; ?>

							<?php endwhile; ?>

						</select><!-- #topic_group_id -->
					</p>

					<?php do_action( 'groups_forum_new_topic_after' ); ?>

					<div class="submit">
						<input type="submit" class="btn-gray" name="submit_topic" id="submit" value="<?php _e( 'Post Topic', 'huddle' ); ?>" />
						<input type="button" class="btn-gray" name="submit_topic_cancel" id="submit_topic_cancel" value="<?php _e( 'Cancel', 'huddle' ); ?>" />
					</div>

					<?php wp_nonce_field( 'bp_forums_new_topic' ); ?>

				</form><!-- #forum-topic-form -->

			<?php elseif ( bp_is_active( 'groups' ) ) : ?>

				<div id="message" class="info">

					<p><?php printf( __( "You are not a member of any groups so you don't have any group forums you can post in. To start posting, first find a group that matches the topic subject you'd like to start. If this group does not exist, why not <a href='%s'>create a new group</a>? Once you have joined or created the group you can post your topic in that group's forum.", 'huddle' ), site_url( bp_get_groups_root_slug() . '/create/' ) ) ?></p>

				</div>

			<?php endif; ?>

		<?php endif; ?>
	</div><!-- #new-topic-post -->

	<?php do_action( 'bp_after_new_topic_form' ); ?>

	<?php do_action( 'bp_after_directory_forums_content' ); ?>

	<?php do_action( 'bp_after_directory_forums_page' ); ?>

<?php get_footer( 'buddypress' ); ?>
