<?php
/*
Template Name: Archive
*/
?>

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
									<figure class="entry-thumb" <?php echo ci_setting('featured_single_align'); ?>>
										<a href="<?php echo ci_get_featured_image_src( 'large' ); ?>" class="lbx">
											<?php ci_the_post_thumbnail(array( 'noalign' => true )); ?>
										</a>
									</figure>
								<?php endif; ?>

								<div class="entry-content">
									<?php the_content(); ?>

									<?php
										$q = new WP_Query( array(
											'paged'               => ci_get_page_var(),
											'ignore_sticky_posts' => 1,
											'showposts'           => ci_setting( 'archive_no' )
										) );
									?>
									<h2><?php _e('Latest posts', 'ci_theme'); ?></h2>
									<ul class="lst archive">
										<?php while ($q->have_posts() ) : $q->the_post(); ?>
											<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> - <?php echo get_the_date(); ?><?php the_excerpt(); ?></li>
										<?php endwhile; wp_reset_postdata(); ?>
									</ul>

									<?php if (ci_setting('archive_week')=='enabled'): ?>
										<h2 class="hdr"><?php _e('Weekly Archive', 'ci_theme'); ?></h2>
										<ul class="lst archive"><?php wp_get_archives('type=weekly&show_post_count=1'); ?></ul>
									<?php endif; ?>

									<?php if (ci_setting('archive_month')=='enabled'): ?>
										<h2 class="hdr"><?php _e('Monthly Archive', 'ci_theme'); ?></h2>
										<ul class="lst archive"><?php wp_get_archives('type=monthly&show_post_count=1'); ?></ul>
									<?php endif; ?>

									<?php if (ci_setting('archive_year')=='enabled'): ?>
										<h2 class="hdr"><?php _e('Yearly Archive', 'ci_theme'); ?></h2>
										<ul class="lst archive"><?php wp_get_archives('type=yearly&show_post_count=1'); ?></ul>
									<?php endif; ?>
								</div>
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
