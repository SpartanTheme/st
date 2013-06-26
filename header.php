<!DOCTYPE html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">
		<title><?php spartan_page_title(); //a better approach to the default ?></title>
		<?php spartan_socs_meta(); ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">		
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>	
		<meta name="application-name" content="<?php bloginfo('name'); ?>">
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
		<meta http-equiv="imagetoolbar" content="false">
		
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>> 
	<!--<?php spartan_tpl(); ?>-->

		<div id="container">

			<header class="header" role="banner">

				<div id="inner-header" class="wrap clearfix">

					<a id="logo" class="h1" href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo( 'name' ); ?></a>	
					<span id="slogan"><?php bloginfo('description'); ?></span>
					
					<a href="https://twitter.com/share" class="twitter-share-button" data-size="large">Tweet</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
					
					<?php spartan_socs(); ?>

				</div><!-- #inner-header -->
				
				<nav role="navigation">
					<?php spartan_main_nav(); // this prints the navigation ?>
				</nav>

			</header>
