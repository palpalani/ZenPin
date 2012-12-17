		<div id="credit">
			<?php //printRSSLink('Album', '', gettext('Album RSS'), ' | '); ?>
			<?php printCustomPageURL(gettext("Archive View"), "archive"); ?> |
			<?php
			if (function_exists('printFavoritesLink')) {
				printFavoritesLink();
				?> | <?php
			}
			?>
			<?php printZenphotoLink(); ?>
			<?php @call_user_func('printUserLogin_out'," | ");	?>
		</div>
		<?php
		//printAdminToolbox();
		zp_apply_filter('theme_body_close');
		?>
	
	<script>
		jQuery(document).ready(function($){
			var $masonry = $('#masonry');

			$('#navigation').css({'visibility':'hidden', 'height':'1px'});

			$masonry.masonry({
			  itemSelector : '.thumb',
			  isFitWidth: true
			});

			$masonry.infinitescroll({
				navSelector : '#navigation',
				nextSelector : '#navigation #navigation-next a',
				itemSelector : '.thumb',
				bufferPx : 500,
				loading: {
					msgText: '',
					finishedMsg: 'All images loaded',
					img: '<?php echo $website; ?>themes/zenpin/images/ajax-loader.gif',
					finished: function() {},
				},
			}, function(newElements) {
				$('#infscr-loading').fadeOut('normal');
				$masonry.masonry('appended', $newElems, true);
			});

			$masonry.on('mouseenter', '.thumb-holder', function() {
				$(this).children('.masonry-actionbar').show();
			});

			$masonry.on('mouseleave', '.thumb-holder', function() {
				$(this).children('.masonry-actionbar').hide();
			});
		});
		/*
		(function($){
			var $masonry = $('#masonry');
			
			$('#navigation').css({'visibility':'hidden', 'height':'1px'});
			
			$masonry.imagesLoaded( function(){
				$masonry.masonry({
					itemSelector : '.thumb',
					isFitWidth: true
				});
			});
		})(jQuery);
		
		jQuery(document).ready(function($){
			var $masonry = $('#masonry');
			
			$masonry.infinitescroll({
				navSelector : 'div.navigation',
				nextSelector : 'div.navigation a',
				itemSelector : '.thumb',
				bufferPx : 500,
				loading: {
					msgText: '',
					finishedMsg: 'All images loaded',
					img: '<?php echo $website; ?>themes/zenpin/images/ajax-loader.gif',
					finished: function() {},
				},
			}, function(newElements) {
				var $newElems = $(newElements).hide();

				$newElems.imagesLoaded(function(){
					$('#infscr-loading').fadeOut('normal');
					$newElems.show();
					$masonry.masonry('appended', $newElems, true);
				});
			});
			
			$masonry.on('mouseenter', '.thumb-holder', function() {
				$(this).children('.masonry-actionbar').show();
			});
			
			$masonry.on('mouseleave', '.thumb-holder', function() {
				$(this).children('.masonry-actionbar').hide();
			});
		});
		*/
		</script>
		<script>
		jQuery(document).ready(function($) {
			var $scrolltotop = $("#scrolltotop");
			$scrolltotop.css('display', 'none');

			$(function () {
				$(window).scroll(function () {
					if ($(this).scrollTop() > 100) {
						$scrolltotop.slideDown('fast');
					} else {
						$scrolltotop.slideUp('fast');
					}
				});
		
				$scrolltotop.click(function () {
					$('body,html').animate({
						scrollTop: 0
					}, 'fast');
					return false;
				});
			});
		});
	</script>
	<script type='text/javascript' src='<?php echo $website; ?>themes/zenpin/bootstrap.min.js'></script>	
	</body>
</html>