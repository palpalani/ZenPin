<?php
// force UTF-8 Ø

if (!defined('WEBPATH'))
	die();

/*
1. List galleries
2. details page
---
Albums
Sub albums
*/
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
		
		<div class="jumbotron">
	      <div class="container">
		<h1>Hello, world!</h1>
		<p><?php printGalleryDesc(); ?></p>
	      </div>
	    </div>
		
		<div class="container">
			<div class="row">
				<?php while (next_album()): ?>
					<div class="col-md-2" style="border: 1px solid #ccc; margin: 0 6px 20px; box-shadow: 0px 8px 8px -1px #bbb; padding: 0;">
						<div class="thumb">
							<a href="<?php echo html_encode(getAlbumURL()); ?>" title="<?php echo gettext('View album:'); ?> <?php printAnnotatedAlbumTitle(); ?>"><?php printAlbumThumbImage(getAnnotatedAlbumTitle()); ?></a>
						</div>
						<div class="albumdesc">
							<h3><a href="<?php echo html_encode(getAlbumURL()); ?>" title="<?php echo gettext('View album:'); ?> <?php printAnnotatedAlbumTitle(); ?>"><?php printAlbumTitle(); ?></a></h3>
							<small><?php printAlbumDate(""); ?></small>
							<div><?php printAlbumDesc(); ?></div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
			<div class="row">
				<?php printPageListWithNav("« " . gettext("prev"), gettext("next") . " »"); ?>
			</div>
		
			<div class="row" id="credit">
				<?php
				if (function_exists('printFavoritesURL')) {
					printFavoritesURL(NULL, '', ' | ', '<br />');
				}
				?>
				<?php @call_user_func('printUserLogin_out', '', ' | '); ?>
				<?php if (class_exists('RSS')) printRSSLink('Gallery', '', 'RSS', ' | '); ?>
				<?php printCustomPageURL(gettext("Archive View"), "archive"); ?> |
				<?php
				if (extensionEnabled('contact_form')) {
					printCustomPageURL(gettext('Contact us'), 'contact', '', '', ' | ');
				}
				?>
				<?php
				if (!zp_loggedin() && function_exists('printRegisterURL')) {
					printRegisterURL(gettext('Register for this site'), '', ' | ');
				}
				?>
				<?php printZenPhoto20(); ?>
			</div>
			<?php @call_user_func('mobileTheme::controlLink'); ?>
			<?php @call_user_func('printLanguageSelector'); ?>
		</div>
		<?php
		zp_apply_filter('theme_body_close');
		?>
	</body>
</html>