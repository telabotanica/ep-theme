<?php do_action( 'bp_before_group_forum_topic' ); ?>

<?php if ( bp_has_forum_topic_posts() ) : ?>

	<form action="<?php bp_forum_topic_action() ?>" method="post" id="forum-topic-form" class="standard-form">

		<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
			<ul>
				<?php if ( is_user_logged_in() ) : ?>

					<li>
						<a href="<?php bp_forum_topic_new_reply_link() ?>" class="new-reply-link"><?php _e( 'New Reply', 'huddle' ) ?></a>
					</li>

				<?php endif; ?>

				<?php if ( bp_forums_has_directory() ) : ?>

					<li>
						<a href="<?php bp_forums_directory_permalink() ?>"><?php _e( 'Forum Directory', 'huddle') ?></a>
					</li>

				<?php endif; ?>

			</ul>
		</div>

		<div id="topic-meta">
			
			<?php if ( bp_group_is_admin() || bp_group_is_mod() || bp_get_the_topic_is_mine() ) : ?>

				<div class="fr admin-links">

					<?php bp_the_topic_admin_links( array( 'seperator' => '&middot;' ) ) ?>

				</div>

			<?php endif; ?>

			<h3><?php bp_the_topic_title() ?></h3>

			<p><?php bp_the_topic_pagination_count() ?></p>

			<?php do_action( 'bp_group_forum_topic_meta' ); ?>

		</div>

		<?php do_action( 'bp_before_group_forum_topic_posts' ) ?>

		<ul id="topic-post-list" class="item-liste" role="main">
			<?php $i = 1; while ( bp_forum_topic_posts() ) : bp_the_forum_topic_post(); ?>

				<li id="post-<?php bp_the_topic_post_id() ?>" class="<?php bp_the_topic_post_css_class() ?>">
					<a href="<?php bp_the_topic_post_poster_link() ?>"><?php bp_the_topic_post_poster_avatar( 'width=35&height=35' ) ?></a>

					<div class="poster-meta">
						<a class="fr post-link" href="#post-<?php bp_the_topic_post_id() ?>" title="<?php _e( 'Permanent link to this post', 'huddle' ) ?>"><?php echo $i++ ?></a>

						<p class="poster-name"><?php bp_the_topic_post_poster_name() ?></p>
						<p class="post-time"><?php bp_the_topic_post_time_since() ?></p>
					</div>

					<div class="post-content">
						<?php bp_the_topic_post_content() ?>

						<?php if ( bp_group_is_admin() || bp_group_is_mod() || bp_get_the_topic_post_is_mine() ) : ?>
							<p class="admin-links"><?php bp_the_topic_post_admin_links() ?></p>
						<?php endif; ?>

						<?php do_action( 'bp_group_forum_post_meta' ); ?>
					</div>
				</li>

			<?php endwhile; ?>
		</ul><!-- #topic-post-list -->

		<?php do_action( 'bp_after_group_forum_topic_posts' ) ?>

		<div class="no-ajax">

			<div class="pagination pagination-links" id="topic-pag-bottom">
				<?php bp_the_topic_pagination() ?>
			</div>

		</div>

		<?php if ( ( is_user_logged_in() && 'public' == bp_get_group_status() ) || bp_group_is_member() ) : ?>

			<?php if ( bp_get_the_topic_is_last_page() ) : ?>

				<?php if ( bp_get_the_topic_is_topic_open() && !bp_group_is_user_banned() ) : ?>

					<div id="post-topic-reply">
						<p id="post-reply"></p>

						<?php if ( bp_groups_auto_join() && !bp_group_is_member() ) : ?>
							<p><?php _e( 'You will auto join this group when you reply to this topic.', 'huddle' ) ?></p>
						<?php endif; ?>

						<?php do_action( 'groups_forum_new_reply_before' ) ?>

						<h4><?php _e( 'Add a reply:', 'huddle' ) ?></h4>

						<p class="editfield">
							<textarea name="reply_text" id="reply_text" rows="4" cols="45"></textarea>
						</p>

						<div class="submit">
							<input type="submit" class="btn-gray" name="submit_reply" id="submit" value="<?php _e( 'Post Reply', 'huddle' ) ?>" />
						</div>

						<?php do_action( 'groups_forum_new_reply_after' ) ?>

						<?php wp_nonce_field( 'bp_forums_new_reply' ) ?>
					</div>

				<?php elseif ( !bp_group_is_user_banned() ) : ?>

					<div id="message" class="info">
						<p><?php _e( 'This topic is closed, replies are no longer accepted.', 'huddle' ) ?></p>
					</div>

				<?php endif; ?>

			<?php endif; ?>

		<?php endif; ?>

	</form><!-- #forum-topic-form -->

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'There are no posts for this topic.', 'huddle' ) ?></p>
	</div>

<?php endif;?>

<?php do_action( 'bp_after_group_forum_topic' ) ?>
