<div class="col-sm-4">
	<div class="sidebar">
		<?php
			if ( is_page() && ! is_front_page() ) {
				dynamic_sidebar( 'pages-sidebar' );
			} else {
				dynamic_sidebar( 'blog-sidebar' );
			}
		?>
	</div>
</div>