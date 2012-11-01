<?php
include_once('header.php');
?>
		<div id="main">
			<div id="gallerytitle">
				<?php
				if (getOption('Allow_search')) {
					$album_list = array('albums'=>array($_zp_current_album->name),'pages'=>'0', 'news'=>'0');
					printSearchForm('', 'search', gettext('Search within album'), gettext('search'), NULL, NULL, $album_list);
				}
				?>
				<h2>
					<span>
						<?php printHomeLink('', ' | '); ?>
						<a href="<?php echo html_encode(getGalleryIndexURL()); ?>" title="<?php echo gettext('Albums Index'); ?>"><?php printGalleryTitle(); ?></a> |
						<?php printParentBreadcrumb(); ?>
					</span>
					<?php printAlbumTitle(true); ?>
				</h2>
			</div>
<div class="container-fluid">
	<div id="masonry">
		<?php 
		$cnt = 0;
		while (next_album()): 
		$cnt ++;
		?>
			<div class="thumb masonry-brick">
			    <div class="album thumb-holder">
				<div class="masonry-actionbar">
					<a class="btn btn-mini" href="http://ericulous.com/ipin/2012/08/31/iphone-20/">View <i class="icon-arrow-right"></i></a>
					<?php @call_user_func('printSlideShowLink'); ?>
				</div>
				<a href="<?php echo html_encode(getAlbumLinkURL()); ?>" title="<?php echo gettext('View album:'); ?> <?php printAnnotatedAlbumTitle(); ?>">
				<?php //printAlbumThumbImage(getAnnotatedAlbumTitle()); 
					echo '<img src="'. getCustomAlbumThumbMaxSpace(220, 250) .'">';
				?>				
				<div class="thumbtitle"><?php printAlbumTitle(); ?></div>							
				</a>
			    </div>
			    <div class="masonry-meta">
				<?php echo $cnt .'---';
				printAlbumDate(""); ?>
			    </div>
			</div>
		<?php endwhile; ?>

				<div id="images">
					<?php while (next_image()): ?>
						<div class="image">
							<div class="imagethumb">
								<a href="<?php echo html_encode(getImageLinkURL()); ?>" title="<?php printBareImageTitle(); ?>">
									<?php printImageThumb(getAnnotatedImageTitle()); ?>
								</a>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
	</div>
	
				<?php printPageListWithNav("« " . gettext("prev"), gettext("next") . " »", false, false, 'navigation', 'next', true, 0); ?>
				<?php if (function_exists('printAddToFavorites')) printAddToFavorites($_zp_current_album); ?>
				<?php printTags('links', gettext('<strong>Tags:</strong>') . ' ', 'taglist', ''); ?>
				<?php //@call_user_func('printGoogleMap'); ?>				
				<?php @call_user_func('printRating'); ?>
				<?php //@call_user_func('printCommentForm'); ?>
			</div>
<div id="scrolltotop"><a href="#"><i class="icon-chevron-up"></i><br />Top</a></div>
</div>
<?php include_once('footer.php'); ?>