<?php do_action( 'bp_before_forums_loop' ); ?>

<?php
global $bp_forum_topics, $forum_template;
if( ! $bp_forum_topics ) $bp_forum_topics = bp_has_forum_topics( bp_ajax_querystring( 'forums' ) );
?>

<?php if ( $bp_forum_topics ) : ?>

	<?php do_action( 'bp_before_directory_forums_list' ); ?>

	<table class="forum">
		<tbody>

			<?php while ( bp_forum_topics() ) : bp_the_forum_topic(); ?>

			<tr class="<?php bp_the_topic_css_class(); ?>">
				<td class="td-title">
					<?php bp_the_topic_poster_avatar( 'width=35&height=35' ) ?>

					<a class="topic-title" href="<?php bp_the_topic_permalink(); ?>" title="<?php bp_the_topic_title(); ?> - <?php _e( 'Permalink', 'huddle' ); ?>">
						<?php bp_the_topic_title(); ?>
					</a>

					<p class="topic-meta">
						<span class="topic-by"><?php printf( __( 'By &middot; %1$s', 'huddle' ), bp_get_the_topic_poster_name() ); ?></span>,
						<span class="topic-on"><?php printf( __( 'On &middot; %1$s', 'huddle' ), date( 'm.d.Y', strtotime( bp_get_the_topic_time() ) ) ); ?></span>
					</p>
				</td>

				<td class="td-group">
					<?php if ( !bp_is_group_forum() ) : ?>

						<p class="topic-meta">
							<?php bp_the_topic_object_avatar( 'width=35&height=35' ) ?>

							<span><?php _e( 'Posted in Group', 'huddle' ) ?></span>
						</p>

						<p class="topic-meta">
							<span>
							<?php
								$topic_in = '<a href="' . bp_get_the_topic_object_permalink() . '" title="' . bp_get_the_topic_object_name() . '">' . bp_get_the_topic_object_name() .'</a>';

								printf( __( '%1$s', 'huddle' ), $topic_in );
							?>
							</span>

						</p>

					<?php endif; ?>
				</td>

				<td class="td-freshness">
					<?php bp_the_topic_last_poster_avatar( 'width=35&height=35' ); ?>

					<span class="time-since"><?php printf( __( 'Last Reply %s', 'huddle' ), bp_get_the_topic_time_since_last_post() ); ?></span>
					<p class="topic-meta">
						<span class="freshness-author">
							<?php _e( 'By &middot; ', 'huddle' ); bp_the_topic_last_poster_name(); ?>
						</span>
					</p>
				</td>

				<td class="td-postcount">
					<a href="<?php bp_the_topic_permalink(); ?>">
						<?php printf( _n( "<b>%d</b> Reply", "<b>%d</b> Replies", bp_get_the_topic_total_posts() ), bp_get_the_topic_total_posts() ); ?>
					</a>
				</td>

				<?php do_action( 'bp_directory_forums_extra_cell' ); ?>

			</tr>

			<?php do_action( 'bp_directory_forums_extra_row' ); ?>

			<?php endwhile; ?>

		</tbody>
	</table>

	<?php do_action( 'bp_after_directory_forums_list' ); ?>

	<div class="item-list-tabs for-bottom ">
		<p class="pagination fl"><?php bp_forum_pagination(); ?></p>
		<p class="pages-count fr"><?php printf( __( 'Page %d of %d', 'huddle' ), isset( $_GET['upage'] ) ? $_GET['upage'] : 1, ceil( $forum_template->total_topic_count / 21 ) ) ?></p>
	</div>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'Sorry, there were no forum topics found.', 'huddle' ); ?></p>
	</div>

<?php endif; ?>

<?php do_action( 'bp_after_forums_loop' ); ?>
