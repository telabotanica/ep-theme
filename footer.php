		<?php if( ! isset( $_GET['w-iframe'] ) ) : ?>

			<div class="clear"></div>

			<?php do_action( 'bp_after_container' ) ?>

			<?php if( is_singular( 'post' ) || is_home() ) get_sidebar( 'footer' ) ?>

			<?php do_action( 'bp_before_footer' ) ?>
			
			<!-- Retour haut de page -->
			<a href="#subnav" class="retour-haut-page show-responsive" title="Revenir en haut de la page">&#9650;</a>

			<?php do_action( 'bp_after_footer' ) ?>

		<?php endif ?>

	</div>

<?php wp_footer(); ?>

</body>
</html>
