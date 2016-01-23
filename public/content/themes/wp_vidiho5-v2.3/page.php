<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<main class="main">
				<div class="row">
					<div class="col-sm-8">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<article id="post-<?php the_ID();?>" <?php post_class('entry'); ?>>
								<h1 class="entry-title"><?php the_title(); ?></h1>

								<?php if ( ci_has_image_to_show() ) : ?>
									<figure class="entry-thumb" <?php echo ci_setting( 'featured_single_align' ); ?>>
										<a href="<?php echo ci_get_featured_image_src( 'large' ); ?>" class="lbx">
											<?php ci_the_post_thumbnail( array( 'noalign' => true ) ); ?>
										</a>
									</figure>
								<?php endif; ?>

								<div class="entry-content">
									<?php the_content(); ?>
									<?php wp_link_pages(); ?>
								</div>

								<?php comments_template(); ?>
							</article>
						<?php endwhile; endif; ?>
					</div>

					<?php get_sidebar(); ?>
				</div>
			</main>
		</div>
	</div>
</div>

<?php get_footer(); ?>