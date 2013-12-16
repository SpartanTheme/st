<?php
/**
Template Page for the gallery overview
**/
?>
<?php if (!defined ('ABSPATH')) die ('No direct access allowed'); ?><?php if (!empty ($gallery)) : ?>

<?php $album = nggdb::find_album( get_query_var('album') ); ?>

	<ul class="gal-wrap gal-wrap-<?php echo $gallery->ID ?>">

		<?php foreach ( $images as $image ) : ?>


			<li class="thumb-wrap large-4 medium-4 small-6 columns">
				<a class="overlay gall-<?php echo $gallery->ID ?>" rel="gall-<?php echo $gallery->ID ?>" title="<?php echo $image->description ?>"  href="<?php echo $image->imageURL ?>" <?php echo $image->thumbcode ?> >
					<span class='info'><span class="image-title"><?php echo $image->description ?></span>
					<span class="image-description"><?php echo $image->alttext ?></span></span>
					<img title="<?php echo $image->alttext ?>" alt="<?php echo $image->alttext ?>" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" data-src="<?php echo $image->thumbnailURL ?>" <?php echo $image->size ?> />
				</a>
			</li>

		<?php if ( $image->hidden ) continue; ?>
		<?php if ( $gallery->columns > 0 && ++$i % $gallery->columns == 0 ) { ?>
			<br style="clear: both" />
		<?php } ?>
		<?php endforeach; ?>

	</ul>

<?php endif; ?>


