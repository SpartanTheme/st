<aside id='sidebar' <?php post_class('sidebar'); ?> role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
	<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>
	
		<?php dynamic_sidebar( 'sidebar1' ); ?>

	<?php else : ?>

		<div class="alert">
			<p><?php _e("Please activate some Widgets.", "spartantheme");  ?></p>
		</div>

	<?php endif; ?>
</aside>
