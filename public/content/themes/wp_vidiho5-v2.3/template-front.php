<?php
/*
Template Name: Homepage Template
*/
?>

<?php get_header(); ?>

<?php
	$main_class = '';
	$featured   = new WP_Query( array(
		'post_type'      => 'post',
		'meta_key'       => 'ci_format_slider',
		'meta_value'     => 'slider',
		'posts_per_page' => - 1
	) );
?>

<?php if ( $featured->have_posts() ) : ?>
	<div class="home-slider-container">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="home-slider flexslider loading">
						<ul class="slides">
							<?php while ( $featured->have_posts() ) : $featured->the_post(); ?>
							<li>
								<div class="slide-hold">
									<?php
										$format = get_post_format();
										$url    = get_post_meta( get_the_ID(), 'ci_format_video_url', true );

										if ( ! empty( $url ) && $format == 'video' ) {
											echo wp_oembed_get( $url );
										}

										if ( ( $format != 'video' || empty( $url ) ) && has_post_thumbnail() ) {
											the_post_thumbnail( 'homepage_slider' );
										}
									?>
								</div>
							</li>
							<?php endwhile; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; $featured->rewind_posts(); ?>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<main class="main">
				<?php if ( $featured->have_posts() ) : ?>
				<div class="secondary-slider flexslider">
					<ul class="slides">
						<?php while ( $featured->have_posts() ) : $featured->the_post(); ?>
							<li>
								<div class="slide-content">
									<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo get_the_date(); ?></time>
									<h3 class="slide-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<p><?php echo mb_substr( get_the_excerpt(), 0, 170 ); ?>&hellip;</p>
								</div>
							</li>
						<?php endwhile; ?>
					</ul>
				</div>
				<?php endif; wp_reset_postdata(); ?>

				<div class="row">
					<div class="col-sm-8">
						<?php
							$video_query = new WP_Query( array(
								'posts_per_page' => ci_setting( 'front_video_posts' ),
								'tax_query'      => array(
									array(
										'taxonomy' => 'post_format',
										'field'    => 'slug',
										'terms'    => array( 'post-format-video' )
									)
								)
							) );
						?>
						<?php if ( $video_query->have_posts() ) : ?>
							<div class="widget group widget_ci-items">
								<h3 class="widget-title"><span><?php _e('Recent Videos', 'ci_theme'); ?></span></h3>
								<div class="row">
									<?php while ( $video_query->have_posts() ) : $video_query->the_post(); ?>
										<?php
											$format = get_post_format( get_the_ID() );
											$url    = get_post_meta( get_the_ID(), 'ci_format_video_url', true );
										?>
										<div class="col-md-6">
											<article id="entry-<?php the_ID(); ?>" <?php post_class( 'item' ); ?>>
												<figure class="item-thumb">
													<?php if ( !empty( $url ) && $format == 'video' ) : ?>
														<a href="<?php echo esc_url( $url ); ?>" data-options="smartRecognition: true" class="zoom">
															<?php the_post_thumbnail();?>
														</a>
													<?php else: ?>
														<a href="<?php the_permalink(); ?>">
															<?php the_post_thumbnail();?>
														</a>
													<?php endif; ?>
												</figure>

												<time class="item-time" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo get_the_date(); ?></time>
												<h3 class="item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
												<?php the_excerpt(); ?>
											</article>
										</div>
									<?php endwhile; ?>
								</div>
							</div>
						<?php endif; wp_reset_postdata(); ?>

						<?php
							$posts_query = new WP_Query( array(
								'posts_per_page' => ci_setting( 'front_normal_posts' ),
								'tax_query'      => array(
									array(
										'taxonomy' => 'post_format',
										'field'    => 'slug',
										'terms'    => array( 'post-format-video' ),
										'operator' => 'NOT IN'
									)
								)
							) );
						?>
						<?php if ( $posts_query->have_posts() ): ?>
							<div class="widget group widget_ci-items">
								<h3 class="widget-title"><span><?php _e( 'Latest Articles', 'ci_theme' ); ?></span></h3>
								<?php while ( $posts_query->have_posts() ): $posts_query->the_post(); ?>
									<?php get_template_part( 'inc_item_alt' ); ?>
								<?php endwhile; ?>
							</div>
						<?php endif; wp_reset_postdata(); ?>
					</div>

					<?php get_sidebar(); ?>
				</div>
			</main>
		</div>
	</div>
</div>

<?php get_footer(); ?>