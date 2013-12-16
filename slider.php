<section class="work-gallery">

    <ul class="gal-wrap gal-wrap-<?php the_ID(); ?>">
    <?php query_posts( array( 'post_type' => 'slide', 'showposts' => 99 ) );
          if ( have_posts() ) : while ( have_posts() ) : the_post();

          $thumbs = get_post_meta($post->ID, 'thumbs', true);

          $image_path = wp_upload_dir();

     ?>
      <li class="thumb-wrap large-4 medium-4 small-6 columns thumb-<?php the_ID(); ?>">
        <a class="overlay gall-<?php echo $gallery->ID ?>" title="<?php the_title(); ?>" href="<?php if (has_post_thumbnail()) {
            $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail_name');
            echo $thumb[0]; // thumbnail url
            } ?>">
        <span class="info"><span class="image-title"><?php the_title(); ?></span>
        <span class="image-description"><?php the_content(); ?></span></span>
  	    <img title="<?php the_title(); ?>" alt="<?php the_title(); ?>" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?php echo $image_path['url']; ?>/thumbs/<?php echo $thumbs; ?>"></a>
  		</li>
      <?php endwhile; endif; wp_reset_query(); ?>
  	</ul>

</section>