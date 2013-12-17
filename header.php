<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<head data-useragent="<?php echo $_SERVER['HTTP_USER_AGENT']; ?>">

		<meta charset="utf-8">
		<title><?php spartan_page_title(); //a better approach to the default or use a plugin ?></title>
		<?php wp_head(); // wordpress header stuff ?>

	</head>

	<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">

	<!--<?php spartan_tpl(); //template file being used ?>-->

	<div id="noise"></div>

		<div class="off-canvas-wrap">
			<div class="inner-wrap">

				<nav class="left-off-canvas-menu mobile-menu" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">

					<h3 class="site-title"><a href="<?php echo home_url(); ?>" itemprop="url" title="<?php echo bloginfo('name'); ?> - <?php bloginfo('description'); ?>"><?php echo bloginfo('name'); ?></a></h3>

					<?php spartan_mobile_nav(); // mobile navigation ?>

				</nav>

				<a class="left-off-canvas-toggle menu-icon" ><span> </span></a>

				<header class="header row" role="banner" itemscope="itemscope" itemtype="http://schema.org/Organization">

					<h2 class="site-title columns"><a href="<?php echo home_url(); ?>" itemprop="url" title="<?php echo bloginfo('name'); ?> - <?php bloginfo('description'); ?>">Renzo Johnson</a></h2>

					<nav class="top-bar-section docs-bar hide-for-small" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">

						<?php spartan_top_nav(); // top navigation ?>

					</nav>

				</header>

				<div class="main row" role="document">
