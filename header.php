<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">
		<title><?php spartan_page_title(); //a better approach to the default ?></title>
		<?php //spartan_socs_meta(); ?>
		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
	<!--<?php spartan_tpl(); ?>-->

		<div id="page">

			<header class="header" role="banner" itemscope="itemscope" itemtype="http://schema.org/Organization">

				<div class="header-inr wrap clearfix">

					<p class="site-title" itemprop="name" ><a id="logo" class="h1" href="<?php echo home_url(); ?>" itemprop="url" title="<?php echo bloginfo('name'); ?> - <?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></p>

					<nav class="navigation wrap clearfix" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
					<?php spartan_main_nav(); // this prints the navigation ?> <?php spartan_socs(); ?>
				</nav>

				</div><!-- #inner-header -->

			</header>
