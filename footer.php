			<footer class="row footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">

				<div class="large-12 small-12 columns">
					<h2 class="entry-title" itemprop="headline">Contact me</h2>
					<?php echo do_shortcode( '[contact-form-7 id="12" title="Contact"]' ); ?>
				</div>


				<div class="large-6 medium-6 small-12 columns">
					<p class="source-org copyright">&copy; 2004 - <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>
				</div>

				<div class="large-6 medium-6 small-12 columns">
					<ul class="social-widgets">
						<li class="social-widget facebook-widget">
						    <a data-label="<?php bloginfo('name'); ?>" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Frenzojohnson.com" id="facebook-widget">Like</a>
						    <div class="fb-like" data-href="http://renzojohnson.com" data-send="false" data-layout="box_count" data-width="65" data-show-faces="false"></div>
						</li>

				    <li class="social-widget google-widget">
				        <a data-label="<?php bloginfo('name'); ?>" href="https://plus.google.com/share?url=http://renzojohnson.com/" id="google-widget">+1</a>
				        <div class="g-plusone" data-href="http://renzojohnson.com/" data-size="tall"></div>
				    </li>
				    <li class="social-widget twitter-widget">
				        <a data-label="<?php bloginfo('name'); ?>" href="https://twitter.com/share" id="twitter-widget">Tweet</a>
				        <a href="https://twitter.com/share" class="twitter-share-button" data-count="vertical" data-related="renzo_johnson" data-url="http://renzojohnson.com"></a>
				    </li>
					</ul>
				</div>

			</footer>
			<a class="exit-off-canvas"></a>
			</div>
		</div>

		<?php wp_footer(); // wordpress css and js ?>
		<script>
      $(document).foundation();
    </script>
  </body>

</html>
