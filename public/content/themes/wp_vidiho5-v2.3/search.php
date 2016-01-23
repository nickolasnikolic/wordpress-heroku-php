<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<main class="main">
				<div class="row">
					<div class="col-sm-8">
						<h2 class="section-title"><?php _e( 'Search Results', 'ci_theme' ); ?></h2>

						<?php
							global $wp_query;

							$found = $wp_query->found_posts;
							$none  = __( 'No results found. Please broaden your terms and search again.', 'ci_theme' );
							$one   = __( 'Just one result found. We either nailed it, or you might want to broaden your terms and search again.', 'ci_theme' );
							$many  = sprintf( _n( '%d result found.', '%d results found.', $found, 'ci_theme' ), $found );
						?>

						<div class="search-notice">
							<p><?php ci_e_inflect($found, $none, $one, $many); ?></p>
							<?php if( $found==0 ) : ?>
								<?php get_search_form(); ?>
							<?php endif; ?>
						</div>

						<?php while ( have_posts() ): the_post(); ?>
							<?php get_template_part( 'inc_item_alt' ); ?>
						<?php endwhile; ?>

						<?php ci_pagination(); ?>
					</div>

					<?php get_sidebar(); ?>
				</div>
			</main>
		</div>
	</div>
</div>

<?php get_footer(); ?>