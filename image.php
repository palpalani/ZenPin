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
		<?php if (zp_has_filter('theme_head', 'colorbox::css')) { ?>
			<script type="text/javascript">
				// <!-- <![CDATA[
				$(document).ready(function() {
					$(".colorbox").colorbox({
						inline: true,
						href: "#imagemetadata",
						close: '<?php echo gettext("close"); ?>'
					});
				});
				// ]]> -->
			</script>
		<?php } ?>
		<?php if (class_exists('RSS')) printRSSHeaderLink('Gallery', gettext('Gallery RSS')); ?>
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
				printSearchForm('');
			}
			?>
			</div><!--/.navbar-collapse -->
		      </div>
		</div>
		
		<div class="topfix container">
			<ol class="breadcrumb">
				<?php printHomeLink('', '/'); ?>
				<li><a href="<?php echo html_encode(getGalleryIndexURL()); ?>" title="<?php gettext('Albums Index'); ?>"><?php printGalleryTitle(); ?></a></li>
				<?php if ( ! empty(getParentBreadcrumb() ) ) { ?>
				  <li><?php printParentBreadcrumb('', '', ''); ?></li>
				<?php } ?>
				<li><?php printAlbumBreadcrumb("", ""); ?></li>
				<li class="active"><strong><?php printImageTitle(); ?></strong></li>
			</ol>
			<div class="row">
				<div class="col-md-9">
					<h1><?php printImageTitle(); ?></h1>
				</div>
				<div class="col-md-3">
					<ul class="pager">
						<?php
						if (hasPrevImage()) { ?>
							<li><a href="<?php echo html_encode(getPrevImageURL()); ?>" title="<?php echo gettext("Previous Image"); ?>">« <?php echo gettext("prev"); ?></a></li>
						<?php } if (hasNextImage()) { ?>
							<li><a href="<?php echo html_encode(getNextImageURL()); ?>" title="<?php echo gettext("Next Image"); ?>"><?php echo gettext("next"); ?> »</a></li>
							<?php
						}
						?>
					</ul>
				</div>
			</div>
			
			<!-- The Image -->
			<div class="row" id="image">
				<strong>
					<?php
					if (isImagePhoto()) {
						$fullimage = getFullImageURL();
					} else {
						$fullimage = NULL;
					}
					if (!empty($fullimage)) {
						?>
						<a href="<?php echo html_encode(pathurlencode($fullimage)); ?>" title="<?php printBareImageTitle(); ?>">
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
			<div class="row" id="narrow">
				<?php printImageDesc(); ?>
				<hr /><br />
				<?php
				If (function_exists('printAddToFavorites'))
					printAddToFavorites($_zp_current_image);
				@call_user_func('printSlideShowLink');

				if (getImageMetaData()) {
					printImageMetadata(NULL, 'colorbox');
					?>
					<br class="clearall" />
					<?php
				}
				printTags('links', gettext('<strong>Tags:</strong>') . ' ', 'taglist', '');
				?>
				<br class="clearall" />

				<?php @call_user_func('printGoogleMap'); ?>
				<?php @call_user_func('printRating'); ?>
				<?php @call_user_func('printCommentForm'); ?>
			</div>
		
		<div class="row" id="credit">
			<?php
			if (function_exists('printFavoritesURL')) {
				printFavoritesURL(NULL, '', ' | ', '<br />');
			}
			?>
			<?php if (class_exists('RSS')) printRSSLink('Gallery', '', 'RSS', ' | '); ?>
			<?php printCustomPageURL(gettext("Archive View"), "archive"); ?> |
			<?php printZenPhoto20(); ?>
			<?php @call_user_func('printUserLogin_out', " | "); ?>
		</div>
		</div>
		<?php include_once('footer.php'); ?>