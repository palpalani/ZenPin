<?php
// force UTF-8 Ø

if (!defined('WEBPATH'))
	die();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php zp_apply_filter('theme_head'); ?>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<!--
		<link rel="stylesheet" href="<?php echo pathurlencode($zenCSS); ?>" type="text/css" />
		-->
		<link rel="stylesheet" href="<?php echo pathurlencode(dirname(dirname($zenCSS))); ?>/common.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo pathurlencode(dirname(dirname($zenCSS))); ?>/custom.css" type="text/css" />
		<?php if (class_exists('RSS')) printRSSHeaderLink('Album', getAlbumTitle()); ?>
	</head>
	<body>
		<?php zp_apply_filter('theme_body_open'); ?>
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		      <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			    <span class="sr-only">Toggle navigation</span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="#"><?php printGalleryTitle(); ?></a>
			</div>
			
			<div class="navbar-collapse collapse">
			
			<ul class="nav navbar-nav">
			<li class="active"><a href="#">Link</a></li>
			<li><a href="#">Link</a></li>
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
			  <ul class="dropdown-menu" role="menu">
			    <li><a href="#">Action</a></li>
			    <li><a href="#">Another action</a></li>
			    <li><a href="#">Something else here</a></li>
			    <li class="divider"></li>
			    <li><a href="#">Separated link</a></li>
			    <li class="divider"></li>
			    <li><a href="#">One more separated link</a></li>
			  </ul>
			</li>
		      </ul>
			
			<?php
			if (getOption('Allow_search')) {
				$album_list = array('albums' => array($_zp_current_album->name), 'pages' => '0', 'news' => '0');
				printSearchForm('', 'search', gettext('Search within album'), gettext('search'), NULL, NULL, $album_list);
			}
			?>
			</div><!--/.navbar-collapse -->
		      </div>
		</div>

		<div class="topfix container">
			
			<ol class="breadcrumb">
				  <?php printHomeLink('', '/'); ?>
				  <li><a href="<?php echo html_encode(getGalleryIndexURL()); ?>" title="<?php echo gettext('Albums Index'); ?>"><?php printGalleryTitle(); ?></a></li>
				  <?php if ( ! empty(getParentBreadcrumb() ) ) { ?>
				  <li><?php printParentBreadcrumb('', '', ''); ?></li>
				  <?php } ?>
				  <li class="active"><strong><?php printAlbumTitle(); ?></strong></li>
			</ol>
			
			<h1><?php printAlbumTitle(); ?></h1>			
			<?php printAlbumDesc(); ?>
			<div class="row" id="albums">
				<?php while (next_album()): ?>
					<div class="col-md-2">
						<div class="thumb">
							<a href="<?php echo html_encode(getAlbumURL()); ?>" title="<?php echo gettext('View album:'); ?> <?php printAnnotatedAlbumTitle(); ?>">
							<?php 
								//printAlbumThumbImage(getAnnotatedAlbumTitle());
								$img_thumb_url = getCustomAlbumThumbMaxSpace(220, 999);
								echo '<img itemprop="image" src="'. $img_thumb_url .'">';
							?>
							</a>
						</div>
						<div class="albumdesc">
							<h3><a href="<?php echo html_encode(getAlbumURL()); ?>" title="<?php echo gettext('View album:'); ?> <?php printAnnotatedAlbumTitle(); ?>"><?php printAlbumTitle(); ?></a></h3>
							<small><?php printAlbumDate(""); ?></small>
							<div><?php printAlbumDesc(); ?></div>
						</div>
						<p style="clear: both; "></p>
					</div>
				<?php endwhile; ?>
			</div>
			<div class="row" id="images">
				<?php while (next_image()): ?>
					<div class="col-md-2">
						<div class="imagethumb">
							<a href="<?php echo html_encode(getImageURL()); ?>" title="<?php printBareImageTitle(); ?>">
								<?php 
								//printImageThumb(getAnnotatedImageTitle());
								$img_thumb_url = getCustomSizedImageThumbMaxSpace(220, 999);
								echo '<img itemprop="image" src="'. $img_thumb_url .'">';
								?>
							</a>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
			<div class="row">
				<?php printPageListWithNav("« " . gettext("prev"), gettext("next") . " »", false, true, 'pagination'); ?>
				<?php if (function_exists('printAddToFavorites')) printAddToFavorites($_zp_current_album); ?>
				<?php printTags('links', gettext('<strong>Tags:</strong>') . ' ', 'taglist', ''); ?>
				<?php @call_user_func('printGoogleMap'); ?>
				<?php @call_user_func('printSlideShowLink'); ?>
				<?php @call_user_func('printRating'); ?>
				<?php @call_user_func('printCommentForm'); ?>
			</div>
		
			<div class="row" id="credit">
				<?php
				if (function_exists('printFavoritesURL')) {
					printFavoritesURL(NULL, '', ' | ', '<br />');
				}
				?>
				<?php if (class_exists('RSS')) printRSSLink('Album', '', gettext('Album RSS'), ' | '); ?>
				<?php printCustomPageURL(gettext("Archive View"), "archive"); ?> |
				<?php printZenPhoto20(); ?>
				<?php @call_user_func('printUserLogin_out', " | "); ?>
			</div>
	
	<?php include_once('footer.php'); ?>