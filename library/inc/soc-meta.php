<?php 
	function spartan_soc_img() {
		$spartan_og = get_post_meta($post->ID, 'social', true);
		if ($spartan_og) 
		echo $spartan_og; 
		else echo('http://spartantheme.com/wp-content/uploads/spartan-theme-social.png');
	};
		
	$my_query = new WP_Query('posts_per_page=1');  
	while ($my_query->have_posts()) : $my_query->the_post();  

	function spartan_soc_content() {
		$content = get_the_content();
	      $content = strip_tags($content);
	      echo substr($content, 0, 140);
}
?>

		<meta name="description" content="<?php spartan_soc_content(); ?>">
		<meta name="author" content="<?php the_author(); ?>">
		
		<meta name="twitter:site" content="@SpartanTheme">
		<meta name="twitter:card" content="summary">
		<meta name="twitter:url" content="<?php the_permalink() ?>">
		<meta name="twitter:title" content="<?php spartan_page_title(); ?>">
		<meta name="twitter:description" content="<?php spartan_soc_content(); ?>">
		<meta name="twitter:image" content="<?php spartan_soc_img(); ?>">
		
		<meta property="og:url" content="<?php the_permalink() ?>">
		<meta property="og:site_name" content="<?php spartan_domain(); ?>">
		<meta property="og:title" content="<?php spartan_page_title(); ?>">
		<meta property="og:description" content="<?php spartan_soc_content(); ?>">
		<meta property="og:image" content="<?php spartan_soc_img(); ?>">
		
<?php endwhile; ?>
<?php wp_reset_postdata(); // reset the query ?>