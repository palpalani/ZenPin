<?php include_once('header.php'); ?>
<div id="main">
	<div id="gallerytitle">
		<h2>
			<span>
				<?php printHomeLink('', ' | '); ?><a href="<?php echo html_encode(getGalleryIndexURL()); ?>" title="<?php echo gettext('Gallery Index'); ?>"><?php printGalleryTitle(); ?></a>
			</span> | <?php echo gettext("Object not found"); ?>
		</h2>
	</div>
	<div id="padbox">
		<?php
		echo gettext("The Zenphoto object you are requesting cannot be found.");
		if (isset($album)) {
			echo '<br />' . sprintf(gettext('Album: %s'), html_encode($album));
		}
		if (isset($image)) {
			echo '<br />' . sprintf(gettext('Image: %s'), html_encode($image));
		}
		if (isset($obj)) {
			echo '<br />' . sprintf(gettext('Page: %s'), html_encode(substr(basename($obj), 0, -4)));
		}
		?>
	</div>
</div>
<?php include_once('footer.php'); ?>
