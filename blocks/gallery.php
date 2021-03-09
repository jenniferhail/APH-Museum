<section class="block gallery">
	<div class="wrapper">
		<div class="row">
			<div class="col content">

				<h3><?php the_sub_field( 'title' ); ?></h3>

				<?php the_sub_field( 'content' ); ?>

				<figure>
					<figcaption>Virtual Tour:</figcaption>

					<?php $audio = get_sub_field( 'audio' ); ?>
					<?php if ( $audio ) : ?>

						<audio controls src="<?php echo esc_url( $audio['url'] ); ?>">
							Your browser does not support the
							<code>audio</code> element.
						</audio>		

					<?php endif; ?>
				</figure>
			</div>
			<div class="col image">
				<div class="glide">
					<div class="glide__track" data-glide-el="track">
						<ul class="glide__slides">

							<?php if(get_sub_field( 'gallery_type' ) == "images") : ?>
								<?php $images = get_sub_field( 'images' ); ?>
								<?php if ( $images ) :  ?>
									<?php foreach ( $images as $image ): ?>

										<li class="glide__slide"
											data-src="<?php echo esc_url( $image['url'] ); ?>">
											<img src='<?php echo esc_url( $image['url'] ); ?>'
												alt="<?php echo esc_attr( $image['alt'] ); ?>" />
										</li>	

									<?php endforeach; ?>
								<?php endif; ?>
							<?php else: ?>
								<?php $records = get_sub_field( 'records' ); ?>
								<?php if ( $records ) : ?>
									<?php foreach ( $records as $post ) : ?>
										
										<?php setup_postdata ( $post ); ?>
										<?php $image = get_field('image'); ?>

										<li class="glide__slide"
											data-src="<?php echo esc_url( $image['url'] ); ?>">
											<a href="<?php the_permalink(); ?>">
												<img src='<?php echo esc_url( $image['url'] ); ?>'
													alt="<?php echo esc_attr( $image['alt'] ); ?>" />
											</a>
										</li>	
									
									<?php endforeach; ?>
									<?php wp_reset_postdata(); ?>
								<?php endif; ?>
							<?php endif; ?>

						</ul>
					</div>
					<div class="glide__arrows" data-glide-el="controls">
						<button class="glide__arrow glide__arrow--left" data-glide-dir="<">Last Item</button>
						<div class="slide-counter">1 of 5</div>
						<button class="glide__arrow glide__arrow--right" data-glide-dir=">">Next Item</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>