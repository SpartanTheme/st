<?php get_header(); ?>

	<div class="large-12 medium-12 columns" role="main" itemprop="mainContentOfPage">

		<?php include 'tpl/content.php'; ?>
		<?php

		if ( is_page('home') ) {

			include 'slider.php';

		}
		?>

	</div>

<?php get_footer(); ?>