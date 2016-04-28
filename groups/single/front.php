<?php do_action( 'bp_before_group_front_content' ); ?>

<div id="group-front-page">
	<?php
	global $wp_filter;
	// si le hook "bp_group_front_content" est utilisé (par le plugin TB)
	if (! empty($wp_filter['bp_group_front_content'])) {
		do_action( 'bp_group_front_content' );
	} else { // sinon, par défaut on affiche la liste des membres
		include "members.php";
	}
	?>
</div>

<?php do_action( 'bp_after_group_front_content' );
