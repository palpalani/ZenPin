<?php 
$page = "index";
include_once('header.php');
?>

<div class="container-fluid">
	<div id="masonry">
		<?php while (next_album()): ?>
			<div class="thumb masonry-brick">
				<div class="album thumb-holder">
					<div class="masonry-actionbar">
						<a class="btn btn-mini" href="<?php echo html_encode(getAlbumLinkURL()); ?>">View <i class="icon-arrow-right"></i></a>
						<?php //@call_user_func('printSlideShowLink'); ?>
					</div>
					<a href="<?php echo html_encode(getAlbumLinkURL()); ?>" title="<?php echo gettext('View album:'); ?> <?php printAnnotatedAlbumTitle(); ?>">
						<?php //printAlbumThumbImage(getAnnotatedAlbumTitle()); 
						echo '<img src="'. getCustomAlbumThumbMaxSpace(220, 400) .'">';
						?>
						<div class="thumbtitle"><?php printAlbumTitle(); ?></div>
					</a>
					<div class="masonry-meta"><p><?php printAlbumDesc(); ?></p></div>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
	<?php printPageListWithNav("« " . gettext("prev"), gettext("next") . " »", false, false, 'navigation', 'next', true, 0); ?>
	<div id="scrolltotop"><a href="#"><i class="icon-chevron-up"></i><br />Top</a></div>
</div>
<?php include_once('footer.php'); ?>