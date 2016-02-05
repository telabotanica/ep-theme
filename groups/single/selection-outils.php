<?php get_header( 'buddypress' ); ?>

	<script type="text/javascript">
	if ( top.location != self.location ) top.location = self.location.href;
	</script>

	<div id="content">
		<div class="padder">
		
			<?php if ( bp_has_groups() ) : while ( bp_groups() ) : bp_the_group(); ?>

			<?php do_action( 'bp_before_group_home_content' ) ?>

			<div id="item-header" role="complementary">

				<?php locate_template( array( 'groups/single/group-header.php' ), true ); ?>

			</div><!-- #item-header -->

			<div id="item-nav">
				<div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
					<ul>

						<?php bp_get_options_nav(); ?>

						<?php do_action( 'bp_group_options_nav' ); ?><?php do_action( 'bp_group_options_nav' ); ?>
						
					</ul>
				</div>
			</div><!-- #item-nav -->

			<div id="item-body">
				
				<form method="post" action="">

					<h3>Sélection des outils</h3>
					<p>
						<label for="porte-documents">
							<h4>Porte-documents</h4>
							<input type="checkbox" name="porte-documents" value="true" />
						</label>
					</p>
					<p>
						<label for="forum">
							<h4>Forum</h4>
							<input type="radio" name="forum" value="true" />Activer
						</label>
					</p>
				
					<p><input type="submit" class="btn-gray" value="<?php _e( 'Save Changes', 'huddle' ) ?>" id="save" name="save" /></p>

					
				</form>

			</div><!-- #item-body -->

			<?php do_action( 'bp_after_group_home_content' ); ?>

			<?php endwhile; endif; ?>

		</div><!-- .padder -->
	</div><!-- #content -->

<?php get_sidebar( 'buddypress' ); ?>
<?php get_footer( 'buddypress' ); ?>
