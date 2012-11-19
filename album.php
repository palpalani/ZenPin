<?php
include_once('header.php');
?>

<ul class="breadcrumb">
<li><a href="<?php echo html_encode(getGalleryIndexURL());?>" title="<?php echo gettext('Albums Index'); ?>"><?php echo getGalleryTitle();?></a> <span class="divider">/</span></li>
<li><?php printParentBreadcrumb(); ?></li>
<?php
  if( getCurrentPage() == 1 ){
  ?>
  <li><?php printAlbumTitle(false);?></li>
  <?php
  }else{
  ?>
  <li><a href="<?php echo getAlbumLinkURL(); ?>"><?php echo printAlbumTitle(false); ?></a> <span class="divider">/</span></li>
  <li>Page <?php echo getCurrentPage(); ?></li>
  <?php
  }
  ?>
</ul>

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
					<a class="btn btn-mini" href="<?php echo html_encode(getAlbumLinkURL()); ?>">View <i class="icon-arrow-right"></i></a>
					<?php @call_user_func('printSlideShowLink'); ?>
				</div>
				<a href="<?php echo html_encode(getAlbumLinkURL()); ?>" title="<?php echo gettext('View album:'); ?> <?php printAnnotatedAlbumTitle(); ?>">
				<?php //printAlbumThumbImage(getAnnotatedAlbumTitle()); 
					echo '<img src="'. getCustomAlbumThumbMaxSpace(220, 250) .'">';
				?>				
				<div class="thumbtitle"><?php printAlbumTitle(); ?></div>							
				</a>
			    </div>
			</div>
		<?php endwhile; ?>


		<?php while (next_image()): ?>
			<div class="thumb masonry-brick">
				<div class="image album thumb-holder">
					<div class="masonry-actionbar">
						<a class="btn btn-mini" href="<?php echo html_encode(getImageLinkURL()); ?>">View <i class="icon-arrow-right"></i></a>
					</div>
					<a href="<?php echo html_encode(getImageLinkURL()); ?>" title="<?php printBareImageTitle(); ?>">
						<?php //printImageThumb(getAnnotatedImageTitle());
							echo '<img src="'. getCustomSizedImageThumbMaxSpace(220, 250) .'">';
						?>				
						<div class="thumbtitle"><?php printBareImageTitle(); ?></div>
					</a>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
	
	<?php printPageListWithNav("« " . gettext("prev"), gettext("next") . " »", false, false, 'navigation', 'next', true, 0); ?>
	<?php if (function_exists('printAddToFavorites')) printAddToFavorites($_zp_current_album); ?>
	<?php printTags('links', gettext('<strong>Tags:</strong>') . ' ', 'taglist', ''); ?>
	<?php //@call_user_func('printGoogleMap'); ?>				
	<?php @call_user_func('printRating'); ?>
	<?php //@call_user_func('printCommentForm'); ?>
	<div id="scrolltotop"><a href="#"><i class="icon-chevron-up"></i><br />Top</a></div>
</div>
<?php include_once('footer.php'); ?>