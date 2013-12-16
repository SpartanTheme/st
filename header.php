<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">
		<title><?php spartan_page_title(); //a better approach to the default or use a plugin ?></title>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
	<!--<?php spartan_tpl(); //this prints the template file being used ?>-->

		<div class="marketing off-canvas-wrap">
			<div class="inner-wrap">

			<a class="left-off-canvas-toggle" >Menu</a>

			<aside class="left-off-canvas-menu">
			<?php spartan_mobile_nav(); // this prints the navigation ?>

			</aside>


			<a class="exit-off-canvas"></a>

			<header class="header" role="banner" itemscope="itemscope" itemtype="http://schema.org/Organization">

				<div class="header-inr clearfix">

					<p class="site-title" itemprop="name" ><a id="logo" class="h1" href="<?php echo home_url(); ?>" itemprop="url" title="<?php echo bloginfo('name'); ?> - <?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></p>
					<?php spartan_socs();  // this prints social icons ?>

				</div>

				<nav class="top-bar docs-bar hide-for-small" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">

					<?php spartan_top_nav(); // this prints the navigation ?>

				</nav>

			</header>
