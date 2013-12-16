<?php 
/**
Template Page for the gallery overview
**/
?>
<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?><?php if (!empty ($gallery)) : ?>
	
<?php $album = nggdb::find_album( get_query_var('album') ); ?>

	<ul class="gal-wrap gal-wrap-<?php echo $gallery->ID ?>">
	
		<?php foreach ( $images as $image ) : ?>
		
			
			<li class="thumb-wrap" style="background-image: url('<?php echo $image->thumbnailURL ?>') ;">		
				<a class="overlay gall-<?php echo $gallery->ID ?>" rel="gall-<?php echo $gallery->ID ?>" title="<?php echo $image->description ?>"  href="<?php echo $image->imageURL ?>" <?php echo $image->thumbcode ?> >
					<span class='info'><span class="image-title"><?php echo $image->description ?></span>
					<span class="image-description"><?php echo $image->alttext ?></span></span>	
				</a>
			</li>

		<?php if ( $image->hidden ) continue; ?>
		<?php if ( $gallery->columns > 0 && ++$i % $gallery->columns == 0 ) { ?>
			<br style="clear: both" />
		<?php } ?>
		<?php endforeach; ?>
				
	</ul>

<?php endif; ?>


