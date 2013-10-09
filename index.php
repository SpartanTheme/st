<?php get_header(); ?>

			<div class="content">

				<div class="content-inr wrap clearfix">

						<div class="main clearfix" role="main" itemprop="mainContentOfPage">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">

								<header class="article-header">

									<h1 class="h2" itemprop="headline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									<time class="updated" datetime="<?php echo get_the_time('c'); ?>" pubdate><?php echo get_the_date(); ?></time>
									<p class="byline author vcard"><?php echo __('By', 'spartan'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a></p>

								</header> <!-- article header -->

								<section class="entry-content clearfix">
									<?php the_content(); ?>
								</section> <!-- article section -->

								<footer class="article-footer">
									<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'spartantheme') . '</span> ', ', ', ''); ?></p>

								</footer> <!-- article footer -->

								<?php include('library/inc/comments.php') ?>

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

						</div> <!-- #main -->

						<?php get_sidebar(); ?>

				</div> <!-- #inner-content -->

			</div> <!-- #content -->

<?php get_footer(); ?>
