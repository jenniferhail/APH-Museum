<?php the_field( 'title' ); ?>
<?php the_field( 'content' ); ?>
<?php $audio = get_field( 'audio' ); ?>
<?php if ( $audio ) : ?>
	<a href="<?php echo esc_url( $audio['url'] ); ?>"><?php echo esc_html( $audio['filename'] ); ?></a>
<?php endif; ?>
<?php the_field( 'gallery_type' ); ?>
<?php $images_images = get_field( 'images' ); ?>
<?php if ( $images_images ) :  ?>
	<?php foreach ( $images_images as $images_image ): ?>
		<a href="<?php echo esc_url( $images_image['url'] ); ?>">
			<img src="<?php echo esc_url( $images_image['sizes']['thumbnail'] ); ?>" alt="<?php echo esc_attr( $images_image['alt'] ); ?>" />
		</a>
		<p><?php echo esc_html( $images_image['caption'] ); ?></p>
	<?php endforeach; ?>
<?php endif; ?>
<?php $records = get_field( 'records' ); ?>
<?php if ( $records ) : ?>
	<?php foreach ( $records as $post ) : ?>
		<?php setup_postdata ( $post ); ?>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	<?php endforeach; ?>
	<?php wp_reset_postdata(); ?>
<?php endif; ?>










<?php 
	$slide_counter = 0;
?>

<section class="block gallery">
    <div class="wrapper">
        <div class="row">
            <div class="col content">
				<h3><?php the_sub_field( 'title' ); ?></h3>

				<?php the_sub_field( 'content' ); ?>

				<?php $audio = get_sub_field( 'audio' ); ?>
				
				<?php if ( $audio ) : ?>

					<figure>
						<figcaption>Virtual Tour:</figcaption>
						<audio controls="controls" src="<?php echo esc_url( $audio['url'] ); ?>">
							Your browser does not support the
							<code>audio</code> element.
						</audio>
					</figure>

				<?php endif; ?>

            </div>
            <div class="col image">
				<div class="glide">
					<div class="glide__track" data-glide-el="track">
						<div class="glide__slides" itemscope itemtype="http://schema.org/ImageGallery">

				
							<?php if (get_sub_field('gallery_type') == 'images') : ?>
								<?php $images_images = get_sub_field( 'images' ); ?>
								<?php if ( $images_images ) :  ?>
									<?php foreach ( $images_images as $images_image ): ?>

										<?php $slide_counter++; ?>

										<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject"
											data-glideindex="0" class="glide__slide">
											<a href="<?php echo esc_url( $images_image['url'] ); ?>" itemprop="contentUrl" data-size="1024x683" class="glide__link">
												<img src="<?php echo esc_url( $images_image['url'] ); ?>" alt="Slide <?php echo $slide_counter; ?> image" itemprop="thumbnail">
											</a>
										</figure>

									<?php endforeach; ?>
								<?php endif; ?>
							<?php else : ?>
								<?php $records = get_field( 'records' ); ?>
								<?php if ( $records ) : ?>
									<?php foreach ( $records as $post ) : ?>
										<?php setup_postdata ( $post ); ?>
										
										<?php $images_images = get_field( 'images' ); ?>

										<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject"
											data-glideindex="0" class="glide__slide">
											<a href="<?php the_permalink(); ?>" itemprop="contentUrl" data-size="1024x683" class="glide__link">
												<img src="<?php echo esc_url( $images_image['url'] ); ?>" alt="Slide <?php echo $slide_counter; ?> image" itemprop="thumbnail">
											</a>
										</figure>
									<?php endforeach; ?>
									<?php wp_reset_postdata(); ?>
								<?php endif; ?>
							<?php endif; ?>

						</div>
					</div>
					<div data-glide-el="controls" class="glide__arrows">
						<button data-glide-dir="<" class="glide__arrow glide__arrow--left">
						Last item
						</button> 
						<div class="slide-counter">1 of 3</div>
						<button data-glide-dir=">" class="glide__arrow glide__arrow--right">
						Next item
						</button>
					</div>                
				</div>
			</div>


			<?php $records = get_sub_field( 'records' ); ?>
			
			<?php if ( $records ) : ?>

				<?php foreach ( $records as $post ) : ?>

					<?php setup_postdata ( $post ); ?>

					<div>

						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

						<?php $image = get_field( 'image' ); ?>
						<?php if ( $image ) : ?>
							<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
						<?php endif; ?>

					</div>

				<?php endforeach; ?>

				<?php wp_reset_postdata(); ?>

			<?php endif; ?>


        </div>
    </div>
</section>
