			<footer class="footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">

				<div class="footer-inr wrap clearfix">

					<nav role="navigation">
						<?php spartan_footer_nav(); // this prints the footer navigation ?>
					</nav>

					<?php spartan_socs();  // this prints social icons  ?>

					<p class="source-org copyright">&copy; 2011 - <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Designed by <a href="http://renzojohnson.com" title="renzo johnson">Renzo Johnson</a> &amp; Powered by Wordpress</p>

				</div> <!-- #inner-footer -->

			</footer>

			</div>

		</div>

		<?php wp_footer(); // wordpress css and js ?>

		<script>
      $(document).foundation();
    </script>
  </body>

	</body>

</html>
