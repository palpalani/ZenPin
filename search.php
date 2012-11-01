<?php include_once('header.php'); ?>
<?php
$total = getNumImages() + getNumAlbums();
if (!$total) {
	$_zp_current_search->clearSearchWords();
}
?>
<div id="main">
	<div id="gallerytitle">
		<?php
		printSearchForm();
		?>
		<h2>
			<span>
				<?php printHomeLink('', ' | '); ?>
				<a href="<?php echo html_encode(getGalleryIndexURL()); ?>" title="<?php echo ('Gallery Index'); ?>"><?php printGalleryTitle(); ?></a>
			</span> |
			<?php
			echo "<em>" . gettext("Search") . "</em>";
			?>
		</h2>
	</div>
	<div id="padbox">
		<?php
		if (($total = getNumImages() + getNumAlbums()) > 0) {
			if (isset($_REQUEST['date'])) {
				$searchwords = getSearchDate();
			} else {
				$searchwords = getSearchWords();
			}
			echo '<p>' . sprintf(gettext('Total matches for <em>%1$s</em>: %2$u'), html_encode($searchwords), $total) . '</p>';
		}
		$c = 0;
		?>
		<div id="albums">
			<?php while (next_album()): $c++; ?>
				<div class="album">
					<div class="thumb">
						<a href="<?php echo html_encode(getAlbumLinkURL()); ?>" title="<?php echo gettext('View album:'); ?> <?php printAnnotatedAlbumTitle(); ?>"><?php printAlbumThumbImage(getAnnotatedAlbumTitle()); ?></a>
					</div>
					<div class="albumdesc">
						<h3><a href="<?php echo html_encode(getAlbumLinkURL()); ?>" title="<?php echo gettext('View album:'); ?> <?php printAnnotatedAlbumTitle(); ?>"><?php printAlbumTitle(); ?></a></h3>
						<p><?php printAlbumDesc(); ?></p>
						<small><?php printAlbumDate(gettext("Date:") . ' '); ?> </small>
					</div>
					<p style="clear: both; "></p>
				</div>
			<?php endwhile; ?>
		</div>
		<div id="images">
			<?php while (next_image()): $c++; ?>
				<div class="image">
					<div class="imagethumb"><a href="<?php echo html_encode(getImageLinkURL()); ?>" title="<?php printBareImageTitle(); ?>"><?php printImageThumb(getAnnotatedImageTitle()); ?></a></div>
				</div>
			<?php endwhile; ?>
		</div>
		<br clear="all" />
		<?php
		 @call_user_func('printSlideShowLink');
		if ($c == 0) {
			echo "<p>" . gettext("Sorry, no image matches found. Try refining your search.") . "</p>";
		}
		printPageListWithNav("« " . gettext("prev"), gettext("next") . " »");
		?>
	</div>
</div>
<?php include_once('footer.php'); ?>