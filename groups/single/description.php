<?php

do_action( 'bp_before_group_header' );

?>

<div id="item-header-content">

	<?php do_action( 'bp_before_group_header_meta' ); ?>

	<div id="item-meta">

		<div id="item-buttons">

			<?php do_action( 'bp_group_header_actions' ); ?>

		</div><!-- #item-buttons -->

		<?php do_action( 'bp_group_header_meta' ); ?>
		
		<!-- Emplacement Page du widget (YOYO)
		<div class="widget-page">
			<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('page') ) ?>
		</div>
		-->

	</div>
</div><!-- #item-header-content -->

<?php
do_action( 'bp_after_group_header' );
do_action( 'template_notices' );
?>
