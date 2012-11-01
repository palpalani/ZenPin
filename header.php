<?php
// force UTF-8 Ø

if (!defined('WEBPATH')) die();
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="shortcut icon" href="/sdz/zenphoto/themes/zenpin/favicon.ico">
		<?php zp_apply_filter('theme_head'); ?>
		<script type="text/javascript" src="/sdz/zenphoto/themes/zenpin/jquery.masonry.min.js"></script>
		<script type="text/javascript" src="/sdz/zenphoto/themes/zenpin/jquery.infinitescroll.min.js"></script>
		<title><?php printBareGalleryTitle(); ?> | <?php printBareAlbumTitle(); if ($_zp_page>1) echo "[$_zp_page]"; ?></title>
		<meta http-equiv="content-type" content="text/html; charset=<?php echo LOCAL_CHARSET; ?>" />
		<link rel="stylesheet" href="<?php //echo pathurlencode($zenCSS); ?>" type="text/css" />
		
		<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!--[if IE 7]>
	  <link href="/sdz/zenphoto/themes/zenpin/font-awesome-ie7.css" rel="stylesheet">
	<![endif]-->
	
	<link rel="stylesheet" href="/sdz/zenphoto/themes/zenpin/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="/sdz/zenphoto/themes/zenpin/font-awesome.css" type="text/css" />
	<link rel="stylesheet" href="/sdz/zenphoto/themes/zenpin/style.css" type="text/css" />
		
		<?php printRSSHeaderLink('Album', getAlbumTitle()); ?>
	</head>
	<body>
		<?php zp_apply_filter('theme_body_open'); ?>
		