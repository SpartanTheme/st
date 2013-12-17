<?php get_header(); ?>

	<div class="large-9 medium-9 columns" role="main" itemprop="mainContentOfPage">

		<?php include 'tpl/content.php'; ?>

		<?php

			if ( is_page('home') ) {

				include 'slider.php';

			}

		?>

	</div>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>