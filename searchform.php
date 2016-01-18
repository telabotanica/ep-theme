
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="search-box">
			<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Enter your search term', 'huddle' ); ?>" />
			<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'huddle' ); ?>" />
		</div>
	</form>
