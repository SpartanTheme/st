<aside <?php post_class('sidebar large-3 medium-3  small-12 columns'); ?> role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">

<?php

	$t=date("H");

	if ($t<"22" && $t>"5")
	 {
		dynamic_sidebar( 'sidebar1' );
		}

	else {
		dynamic_sidebar( 'sidebar2' );
	}

?>

</aside>
