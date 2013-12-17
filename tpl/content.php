<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article id="article-<?php the_ID(); ?>" <?php post_class('spartan'); ?> role="article" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">

		<?php include 'header.php'; ?>

		<?php include 'section.php'; ?>

		<?php include 'footer.php'; ?>

		<?php comments_template( '', true ); ?>

	</article>

<?php endwhile; ?>

		<?php if (function_exists('bones_page_navi')) { ?>
				<?php bones_page_navi(); ?>
		<?php } else { ?>
				<nav class="wp-prev-next">
						<ul class="clearfix">
							<li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "spartantheme")) ?></li>
							<li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "spartantheme")) ?></li>
						</ul>
				</nav>
		<?php } ?>

<?php else : ?>

		<article id="post-not-found" class="hentry clearfix" role="article" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
			<header class="article-header">
				<h1  itemprop="headline"><?php _e("Oops, Post Not Found!", "spartantheme"); ?></h1>
			</header>
			<section class="entry-content">
				<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "spartantheme"); ?></p>
			</section>
			<footer class="article-footer">
				<p><?php _e("This is the error message in the index.php template.", "spartantheme"); ?></p>
			</footer>
		</article>

<?php endif; ?>
