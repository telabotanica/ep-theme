
<?php do_action( 'bp_before_groups_loop' ); ?>

<?php
global $huddle_bp_groups;
if( ! $huddle_bp_groups ) $huddle_bp_groups = bp_has_groups( bp_ajax_querystring( 'groups' ) );
$url = rtrim( current( explode( '?', $_SERVER['REQUEST_URI'] ) ), '/' );
?>

<?php if ( bp_has_groups( bp_ajax_querystring( 'groups' ) ) ) : ?>

	<div id="pag-top" class="pagination">

		<div class="pag-count" id="group-dir-count-top">

			<?php bp_groups_pagination_count(); ?>

		</div>

		<div class="pagination-links" id="group-dir-pag-top">

			<?php bp_groups_pagination_links(); ?>

		</div>

	</div>

	<?php do_action( 'bp_before_directory_groups_list' ); ?>

	<ul id="groups-list" class="item-list" role="main">
	<?php $i_row = 0; $i = 0; $i_column = 0; while ( bp_groups() ) : bp_the_group(); ?>
	
		<!-- Projet -->
		<a href="<?php bp_group_permalink(); ?>">
		
			<li class="tuile-projet">
				
				<!-- Avatar du projet -->
				<div class="avatar-projet">
					<?php bp_group_avatar(); ?>
				</div>
			
				<!-- Titre du projet -->
				<div class="titre-projet">
					<?php bp_group_name(); ?>
				</div>
			
				<!-- Meta-données du projet -->
				<div class="details-projet">
					<div class="membres-projet"><?php bp_group_member_count(); ?></div>
					<div class="description-projet"><?php bp_group_description(); ?></div>
					<?php do_action( 'bp_directory_groups_item' ); ?>
				</div>
			
			</li>
			
		</a>
		
	<?php endwhile; ?>
	</ul>

	<?php do_action( 'bp_after_directory_groups_list' ); ?>

	<div id="pag-bottom" class="pagination">

		<div class="pag-count" id="group-dir-count-bottom">

			<?php bp_groups_pagination_count(); ?>

		</div>

		<div class="pagination-links" id="group-dir-pag-bottom">

			<?php bp_groups_pagination_links(); ?>

		</div>

	</div>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'There were no groups found.', 'huddle' ); ?></p>
	</div>

<?php endif; ?>

<?php do_action( 'bp_after_groups_loop' ); ?>
