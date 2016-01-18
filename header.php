<!DOCTYPE html>
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html id="ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

	<!--Meta Tags-->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<!--Title-->
	<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); if( is_front_page() ) echo ' - ' . get_bloginfo( 'description' ) ?></title>

	<!--Stylesheets-->
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

	<!--RSS Feeds & Pingbacks-->
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!--Hooks-->
	<?php do_action( 'bp_head' ) ?>
	<?php wp_head() ?>

</head>

<body <?php body_class(); ?>>

	<?php if( ! isset( $_GET['w-iframe'] ) ) : ?>

		<?php do_action( 'bp_before_header' ) ?>

		<?php do_action( 'bp_after_header' ) ?>

		<div class="clear"></div>


		<!--<div id="nav">-->

			<div class="grid">

				<?php //wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>

			</div>

		<!--</div><!-- #nav -->

		<?php do_action( 'bp_before_container' ) ?>

	<?php endif ?>

	<div id="content" class="grid">
