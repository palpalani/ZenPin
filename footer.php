		<?php
		zp_apply_filter('theme_body_close');
		?>
		</div>
		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/masonry/3.1.5/masonry.pkgd.min.js"></script>
		<script  type="text/javascript">
			$('.pagination li.current').each( function( index ) { 
				$(this).addClass('active').html("<a href='#'>"+$( this ).text()+"</a>");
			});
			$('#search_form').addClass('navbar-form navbar-right');
			$('#search_input').addClass('form-control');
			$('#search_submit').addClass('btn btn-default');
		</script>
	</body>
</html>