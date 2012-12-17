<?php 
$page = "image";
include_once('header.php');
?>
<div class="span9">
<ul class="breadcrumb">
<li><a href="<?php echo html_encode(getGalleryIndexURL());?>" title="<?php echo gettext('Albums Index'); ?>"><?php echo getGalleryTitle();?></a> <span class="divider">/</span></li>
<li><?php printParentBreadcrumb(); ?></li>
<li><?php printAlbumBreadcrumb();?></li>
<li><?php echo getImageTitle(); ?></li>
</ul>

<div class="pagination">
  <ul>
  <?php if (hasPrevImage()) { ?>
    <li class="prev"><a href="<?php echo html_encode(getPrevImageURL());?>" title="<?php echo gettext("Previous Image"); ?>">&larr; Previous</a></li>
    <?php } 
	if (hasNextImage()) { ?>
    <li class="next"><a href="<?php echo html_encode(getNextImageURL());?>" title="<?php echo gettext("Next Image"); ?>">Next &rarr;</a></li>
    <?php } ?>
    <li><a href="#"><?php echo " Photo: ". imageNumber() . " of ". getNumImages() ." - Total views: <strong>". getHitcounter() ."</strong>";?></a></li>
  </ul>
</div>

<div class="container-fluid">
	
	<!-- The Image -->
	<div id="image">
		<strong>
			<?php
			$fullimage = getFullImageURL();
			if (!empty($fullimage)) {
				?>
				<a href="<?php echo html_encode($fullimage); ?>" title="<?php printBareImageTitle(); ?>">
					<?php
				}
				if (function_exists('printUserSizeImage') && isImagePhoto()) {
					printUserSizeImage(getImageTitle());
				} else {
					printDefaultSizedImage(getImageTitle());
				}
				if (!empty($fullimage)) {
					?>
				</a>
				<?php
			}
			?>
		</strong>
		<?php
		if (isImagePhoto())
			@call_user_func('printUserSizeSelector');
		?>
	</div>
	<div id="narrow">
		<?php printImageDesc(true); ?>
		<hr /><br />
		<?php
		If (function_exists('printAddToFavorites')) printAddToFavorites($_zp_current_image);
		if (getImageMetaData()) {
			echo printImageMetadata(NULL, 'colorbox');
			?>
			<br clear="all" />
			<?php
		}
		printTags('links', gettext('<strong>Tags:</strong>') . ' ', 'taglist', '');
		?>
		<br clear="all" />
		<?php @call_user_func('printSlideShowLink'); ?>
		<?php @call_user_func('printGoogleMap'); ?>
		<?php @call_user_func('printRating'); ?>
		<?php @call_user_func('printCommentForm'); ?>
	</div>
</div>
<?php include_once('footer.php'); ?>