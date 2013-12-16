<section class="slider">
  <div id="slider" class="flexslider">
    <ul class="slides">
    <?php query_posts( array( 'post_type' => 'slide', 'showposts' => 99 ) );
          if ( have_posts() ) : while ( have_posts() ) : the_post();
     ?>
      <li class="slide-<?php the_ID(); ?>">
  	    <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { the_post_thumbnail(array( 1020,520 ), array( 'class' => 'home-slide' )); } ?>
				<div class="descr descr-<?php the_ID(); ?> medium-5 small-5 columns">
          <div class="inner-slide-description">
            <?php the_content(); ?>
          </div>

        </div>

  		</li>
      <?php endwhile; endif; wp_reset_query(); ?>
  	</ul>
  </div>

</section>