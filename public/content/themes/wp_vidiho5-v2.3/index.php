<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<main class="main">
				<div class="row">
					<div class="col-sm-8">
						<h2 class="section-title"><?php get_template_part( 'inc_titles' ); ?></h2>

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