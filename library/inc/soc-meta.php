<?php 
	function spartan_soc_img() {
		$spartan_og = get_post_meta($post->ID, 'social', true);
		if ($spartan_og) 
		echo $spartan_og; 	
		else echo('http://spartantheme.com/wp-content/uploads/spartan-theme-social.png');
	};

if (have_posts()) : while (have_posts()) : the_post();

function spartan_soc_content() {
	$content = get_the_content();
      $content = strip_tags($content);
      echo substr($content, 0, 140);
}
		
?>

		<meta name="description" content="<?php echo $excerpt_raw; ?>">
		<meta name="author" content="<?php the_author(); ?>">
		
		<meta name="twitter:site" content="@SpartanTheme">
		<meta name="twitter:card" content="summary">
		<meta name="twitter:url" content="<?php the_permalink() ?>">
		<meta name="twitter:title" content="<?php spartan_page_title(); ?>">
		<meta name="twitter:description" content="<?php echo $excerpt_raw; ?>">
		<meta name="twitter:image" content="<?php spartan_soc_img(); ?>">
		
		<meta property="og:url" content="<?php the_permalink() ?>">
		<meta property="og:site_name" content="<?php spartan_domain(); ?>">
		<meta property="og:title" content="<?php spartan_page_title(); ?>">
		<meta property="og:description" content="<?php echo $excerpt_raw; ?>">
		<meta property="og:image" content="<?php spartan_soc_img(); ?>">
		<meta property="article:author" content="<?php the_author(); ?>">
		
<?php endwhile; ?>
<?php wp_reset_postdata(); // reset the query ?>
<?php endif; ?>