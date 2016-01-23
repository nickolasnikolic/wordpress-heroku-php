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
								<div class="entry-meta">
									<time class="entry-time" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo get_the_date(); ?></time>
									&ndash;
									<?php
										/* translators: %s is a comma-separated list of categories. */
										echo sprintf( __( 'Posted in %s', 'ci_theme' ), get_the_category_list(', ') );
									?>
								</div>
	
								<?php
									$format = get_post_format( get_the_ID() );
									$url    = get_post_meta( get_the_ID(), 'ci_format_video_url', true );
								?>
	
								<?php if( !empty( $url ) && $format == 'video' ) : ?>
									<figure class="entry-thumb">
										<?php echo wp_oembed_get($url); ?>
									</figure>
								<?php elseif ( ci_has_image_to_show() ) : ?>
									<figure class="entry-thumb" <?php echo ci_setting('featured_single_align'); ?>>
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