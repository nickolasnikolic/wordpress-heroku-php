<?php
	$format = get_post_format( get_the_ID() );
	$url    = get_post_meta( get_the_ID(), 'ci_format_video_url', true );
?>

<article id="entry-<?php the_ID(); ?>" <?php post_class( 'item item-alt' ); ?>>
	<div class="row">
		<?php
			$cols = 'col-xs-12';
			if( (!empty( $url ) && $format == 'video') || has_post_thumbnail() ) {
				$cols = 'col-sm-6';
			}
		?>
		<?php if( $cols == 'col-sm-6' ): ?>
			<div class="<?php echo $cols; ?>">
				<figure class="item-thumb">
					<?php if ( !empty( $url ) && $format == 'video' ) : ?>
						<a href="<?php echo esc_url( $url ); ?>" data-options="smartRecognition: true" class="zoom">
							<?php the_post_thumbnail();?>
						</a>
					<?php else : ?>
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail();?>
						</a>
					<?php endif; ?>
				</figure>
			</div>
		<?php endif; ?>

		<div class="<?php echo $cols; ?>">
			<time class="item-time" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo get_the_date(); ?></time>
			<h3 class="item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

			<?php the_excerpt(); ?>
		</div>
	</div>
</article>
