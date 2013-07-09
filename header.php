<!DOCTYPE html>
<html <?php language_attributes(); ?>>

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

	<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage"> 
	<!--<?php spartan_tpl(); ?>-->

		<div id="page">

			<header class="site-header" role="banner" itemscope="itemscope" itemtype="http://schema.org/Organization">

				<div id="inner-header" class="wrap clearfix">

					<p class="site-title" itemprop="name" ><a id="logo" class="h1" href="<?php echo home_url(); ?>" rel="nofollow" itemprop="url" ><?php bloginfo( 'name' ); ?></a></p>	
					<span id="slogan"><?php bloginfo('description'); ?></span>
					
					<a href="https://twitter.com/share" class="twitter-share-button" data-size="large">Tweet</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
					
					<?php spartan_socs(); ?>

				</div><!-- #inner-header -->
				
				<nav role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
					<?php spartan_main_nav(); // this prints the navigation ?>
				</nav>

			</header>
