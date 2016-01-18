
<?php if ( post_password_required() ) : ?>
	<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'huddle' ); ?></p>
	<?php
		return;
	endif;
?>


<?php if ( have_comments() ) : ?>

	<div class="post-comments" id="comments">
		
		<p><a class="to-respond" href="#respond"><?php _e( 'Leave Your Comment &rarr;', 'huddle' ) ?></a></p>
		<h3><?php comments_number(__('No comments', 'huddle'), __('1 Comment', 'huddle'), __('% Comments', 'huddle')); ?></h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div id="pagination" class="for-comments-top">
				<span class="pages"><?php _e( 'Pages', 'huddle' ) ?></span>
				<?php echo paginate_comments_links() ?>
			</div>
		<?php endif ?>

		<ol class="commentlist">
			<?php wp_list_comments('callback=huddle_comments'); ?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div id="pagination" class="for-comments-bottom">
				<span class="pages"><?php _e( 'Pages', 'huddle' ) ?></span>
				<?php echo paginate_comments_links() ?>
			</div>
		<?php endif ?>

	</div>

<?php else : // this is displayed if there are no comments so far ?>
	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
	<?php endif; ?>
<?php endif; ?>


<?php

add_action( 'comment_form', 'huddle_comment_submit_btn' );
function huddle_comment_submit_btn($post_id) {
	?>
	<p><button><?php _e( 'Submit Comment <span>&rarr;</span>', 'huddle' ) ?></button></p>
	<?php
}

global $aria_req;
comment_form( array(
	'comment_field'				=>	'<textarea name="comment" id="comment" tabindex="4" rows="7" cols="10"></textarea><label for="comment"></label><br><br>',
	'comment_notes_before'		=>	'',
	'comment_notes_after'		=>	'',
	'logged_in_as'				=>	'<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post->ID ) ) ) ) . '</p><br />',
	'title_reply'				=>	__( 'Add Your Comment', 'huddle' ),
	'title_reply_to'			=>	__( 'Add Your Comment', 'huddle' ),
	'cancel_reply_link'			=>	__( 'Cancel Reply To Comment &rarr;', 'huddle' ),
	'label_submit'				=>	__( 'Submit Comment &rarr;', 'huddle' ),
	'id_submit'					=>	'comment-submit',
	'fields'					=>	array(
		'author'				=>	'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="' . __( 'Name', 'huddle' ) . '" ' . $aria_req . ' />' .
									''. ( $req ? '<span class="required"><span>*</span> '.__('Required', 'huddle').'</span>' : '' ) .'<br><br>',
	    'email'					=>	'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" placeholder="' . __( 'Email', 'huddle' ) . '" ' . $aria_req . ' />' .
									''. ( $req ? '<span class="required"><span>*</span> '.__('Required', 'huddle').'</span>' : '' ) .'<br><br>',
		'url'					=>	'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="' . __( 'Website', 'huddle' ) . '" />' .
	            					'<br><br>'
	)
) );

?>
