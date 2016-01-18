		<?php if( ! isset( $_GET['w-iframe'] ) ) : ?>

			<div class="clear"></div>

			<?php do_action( 'bp_after_container' ) ?>

			<?php if( is_singular( 'post' ) || is_home() ) get_sidebar( 'footer' ) ?>

			<?php do_action( 'bp_before_footer' ) ?>
			
			<!--
			<div id="footer">

				<p class="fl"><?php echo of_get_option( 'footer_text', 'Copyright &copy; 2011. All Rights Reserved' ) ?></p>

				<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container' => false ) ); ?>

				<?php do_action( 'bp_footer' ) ?>

			</div> #footer -->

			<?php do_action( 'bp_after_footer' ) ?>

		<?php endif ?>

	</div><!-- #main -->

<?php wp_footer(); ?>

</body>
</html>
