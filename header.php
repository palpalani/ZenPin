<?php
// force UTF-8 Ø

if (!defined('WEBPATH')) die();
$website = html_encode(getGalleryIndexURL(false));
?><!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="shortcut icon" href="<?php echo $website; ?>themes/zenpin/favicon.ico">
		<?php zp_apply_filter('theme_head'); ?>
		<script type="text/javascript" src="<?php echo $website; ?>themes/zenpin/jquery.masonry.min.js"></script>
		<script type="text/javascript" src="<?php echo $website; ?>themes/zenpin/jquery.infinitescroll.min.js"></script>
		<title><?php printBareGalleryTitle(); ?> | <?php printBareAlbumTitle(); if ($_zp_page>1) echo "[$_zp_page]"; ?></title>
		<meta http-equiv="content-type" content="text/html; charset=<?php echo LOCAL_CHARSET; ?>" />
		<link rel="stylesheet" href="<?php //echo pathurlencode($zenCSS); ?>" type="text/css" />
		
		<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!--[if IE 7]>
	  <link href="<?php echo $website; ?>themes/zenpin/font-awesome-ie7.css" rel="stylesheet">
	<![endif]-->
	
	<link rel="stylesheet" href="<?php echo $website; ?>themes/zenpin/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $website; ?>themes/zenpin/font-awesome.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $website; ?>themes/zenpin/style.css" type="text/css" />
		
		<?php //printRSSHeaderLink('Album', getAlbumTitle()); ?>
	</head>
	<body>
		<?php zp_apply_filter('theme_body_open'); ?>
		
		<div class="navbar navbar-fixed-top" data-scrollspy="scrollspy">
      <div class="navbar-inner">
        <div class="container">
	<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo $website; ?>">Your Brand</a>
	  <div class="nav-collapse">
	  <ul class="nav" role="navigation">
		<li><a tabindex="-1" href="<?php echo $website; ?>page/latest-albums/" rel="bookmark">New Albums</a></li>
		<li><a tabindex="-1" href="<?php echo $website; ?>page/popular-albums/" rel="bookmark">Popular Albums</a></li>
          </ul>	  
	  <ul class="pill-left social">
		<li class="span"><a target="_blank" href="https://plus.google.com/108916316436385780486?prsrc=3" style="text-decoration:none;"><img src="https://ssl.gstatic.com/images/icons/gplus-16.png" alt="" style="border:0;width:24px;height:24px;"/></a></li>
		<li class="span"><a target="_blank" href="http://www.youtube.com/user/palpalani"><img src="<?php echo $website; ?>themes/m3palani/images/Youtube_24x24.png" alt="" /></a></li>
		<li class="span"><a target="_blank" href="http://facebook.com/southdreamz"><img src="<?php echo $website; ?>themes/m3palani/images/Facebook_24x24.png" alt="" /></a></li>
		<li class="span"><a target="_blank" href="http://twitter.com/southdreamz"><img src="<?php echo $website; ?>themes/m3palani/images/Twitter_24x24.png" alt="" /></a></li>
		<li class="span"><a target="_blank" href="http://pinterest.com/palpalani/"><img src="https://ssl.gstatic.com/images/icons/gplus-16.png" alt="" /></a></li>
	</ul>
	
	<?php 
		if (getOption('Allow_search')) {
			printSearchForm('', 'search" class="search-form form-search navbar-search span4 pull-right');
		} 
	?>
	</div>
        </div>
      </div>
    </div>