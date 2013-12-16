<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">
		<title><?php spartan_page_title(); //a better approach to the default or use a plugin ?></title>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
	<!--<?php spartan_tpl(); //this prints the template file being used ?>-->
	<div id="noise"></div>

		<div class="off-canvas-wrap">
			<div class="inner-wrap">

				<aside class="left-off-canvas-menu">

					<h1 class="site-title"><a href="<?php echo home_url(); ?>" itemprop="url" title="<?php echo bloginfo('name'); ?> - <?php bloginfo('description'); ?>">Renzo Johnson</a></h1>
					<?php spartan_mobile_nav(); // this prints the navigation ?>

				</aside>

				<a class="left-off-canvas-toggle menu-icon" ><span> </span></a>
				<header class="row" role="banner" itemscope="itemscope" itemtype="http://schema.org/Organization">

						<h2 class="site-title columns"><a href="<?php echo home_url(); ?>" itemprop="url" title="<?php echo bloginfo('name'); ?> - <?php bloginfo('description'); ?>">Renzo Johnson</a></h2>

				</header>


