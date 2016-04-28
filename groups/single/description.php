<?php do_action( 'bp_before_group_description_content' ); ?>

<div id="description-complete">
<?php
	// Simple affichage de la description complète
	echo nl2br(get_value('description-complete'));
?>
</div>

<?php do_action( 'bp_after_group_description_content' );
	  do_action( 'template_notices' );
