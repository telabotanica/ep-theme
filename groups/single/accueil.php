<?php

do_action( 'bp_before_group_header' );

?>

<div id="item-header-content">

	<?php do_action( 'bp_before_group_header_meta' ); ?>

	<div id="item-meta">

		<!-- Description du projet -->
		<?php bp_group_description(); ?>

		<div id="item-buttons">

			<?php do_action( 'bp_group_header_actions' ); ?>

		</div><!-- #item-buttons -->

		<?php do_action( 'bp_group_header_meta' ); ?>

	</div>
</div><!-- #item-header-content -->

<?php
do_action( 'bp_after_group_header' );
do_action( 'template_notices' );
?>
