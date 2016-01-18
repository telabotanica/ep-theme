<form action="<?php bp_messages_form_action('compose') ?>" method="post" id="send_message_form" class="standard-form" role="main">

	<?php do_action( 'bp_before_messages_compose_content' ) ?>

	<ul class="first acfb-holder">
		<li> 
			<?php bp_message_get_recipient_tabs() ?>
			<p class="editfield">
				<label for="send-to-input"><?php _e("Send To (Username or Friend's Name)", 'huddle') ?></label>
				<input type="text" name="send-to-input" class="send-to-input" value="<?php if( isset( $_REQUEST['to'] ) ) echo esc_attr( $_REQUEST['to'] ) ?>" id="send-to-input" />
			</p>
		</li>
	</ul>
	<div class="clear"></div>

	<?php if ( is_super_admin() ) : ?>
		<p class="editfield">
			<label>&nbsp;</label>
			<input type="checkbox" id="send-notice" name="send-notice" value="1" /> <?php _e( "This is a notice to all users.", "huddle" ) ?>
		</p>
		<div class="clear"></div>
	<?php endif; ?>

	<p class="editfield">
		<label for="subject"><?php _e( 'Subject', 'huddle') ?></label>
		<input type="text" name="subject" id="subject" value="<?php bp_messages_subject_value() ?>" />
	</p>
	<div class="clear"></div>

	<p class="editfield">
		<label for="content"><?php _e( 'Message', 'huddle') ?></label>
		<textarea name="content" id="message_content" rows="8" cols="40"><?php bp_messages_content_value() ?></textarea>
	</p>
	<div class="clear"></div>

	<input type="hidden" name="send_to_usernames" id="send-to-usernames" value="<?php bp_message_get_recipient_usernames(); ?>" class="<?php bp_message_get_recipient_usernames() ?>" />

	<?php do_action( 'bp_after_messages_compose_content' ) ?>

	<div class="submit">
		<input type="submit" class="btn-gray" value="<?php _e( "Send Message", 'huddle' ) ?>" name="send" id="send" />
	</div>

	<?php wp_nonce_field( 'messages_send_message' ) ?>
</form>

<script type="text/javascript">
	document.getElementById("send-to-input").focus();
</script>

