<?php include_once('header.php'); ?>
<div id="main">
	<div id="gallerytitle">
		<div class="imgnav">
			<?php if (hasPrevImage()) { ?>
				<div class="imgprevious"><a href="<?php echo html_encode(getPrevImageURL()); ?>" title="<?php echo gettext("Previous Image"); ?>">« <?php echo gettext("prev"); ?></a></div>
			<?php } if (hasNextImage()) { ?>
				<div class="imgnext"><a href="<?php echo html_encode(getNextImageURL()); ?>" title="<?php echo gettext("Next Image"); ?>"><?php echo gettext("next"); ?> »</a></div>
			<?php } ?>
		</div>
		<h2>
			<span>
				<?php printHomeLink('', ' | '); ?>
				<a href="<?php echo html_encode(getGalleryIndexURL()); ?>" title="<?php gettext('Albums Index'); ?>"><?php printGalleryTitle(); ?></a> |
				<?php
				printParentBreadcrumb("", " | ", " | ");
				printAlbumBreadcrumb("", " | ");
				?>
			</span>
			<?php printImageTitle(true); ?>
		</h2>
	</div>
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