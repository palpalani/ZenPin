<?php include_once('header.php'); ?>
<div id="main">
	<div id="gallerytitle">
		<?php if (getOption('Allow_search')) {
			printSearchForm('');
		} ?>
		<h2><?php printHomeLink('', ' | ');
		printGalleryTitle(); ?></h2>
	</div>
	<div id="padbox">
	<?php printGalleryDesc(); ?>
		<div id="albums">
			<?php while (next_album()): ?>
				<div class="album">
					<div class="thumb">
						<a href="<?php echo html_encode(getAlbumLinkURL()); ?>" title="<?php echo gettext('View album:'); ?> <?php printAnnotatedAlbumTitle(); ?>"><?php printAlbumThumbImage(getAnnotatedAlbumTitle()); ?></a>
					</div>
					<div class="albumdesc">
						<h3><a href="<?php echo html_encode(getAlbumLinkURL()); ?>" title="<?php echo gettext('View album:'); ?> <?php printAnnotatedAlbumTitle(); ?>"><?php printAlbumTitle(); ?></a></h3>
						<small><?php printAlbumDate(""); ?></small>
						<p><?php printAlbumDesc(); ?></p>
					</div>
					<p style="clear: both; "></p>
				</div>
			<?php endwhile; ?>
		</div>
		<br clear="all" />
		<?php printPageListWithNav("« " . gettext("prev"), gettext("next") . " »"); ?>
	</div>
</div>
<?php include_once('footer.php'); ?>