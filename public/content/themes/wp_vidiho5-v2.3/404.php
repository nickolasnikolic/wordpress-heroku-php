<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<main class="main">
				<div class="row">
					<div class="col-sm-8">
						<article class="entry">
							<h1 class="entry-title"><?php _e( 'Not Found', 'ci_theme' ); ?></h1>

							<div class="entry-content">
								<p><?php _e( 'Oh, no! The page you requested could not be found. Perhaps searching will help...', 'ci_theme' ); ?></p>
								<?php get_search_form(); ?>
							</div>
						</article>
					</div>
					<?php get_sidebar(); ?>
				</div>
			</main>
		</div>
	</div>
</div>

<?php get_footer(); ?>