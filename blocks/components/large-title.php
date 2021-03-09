<?php if ( have_rows( 'large_title' ) ) : ?>
	<?php while( have_rows('large_title') ): the_row(); ?>

					<!-- Account for changing the H tag. -->
					<?php $header_tag = get_sub_field( 'header_tag' ); ?>

					<<?php echo $header_tag; ?> class="title">

						<?php while ( have_rows( 'lines' ) ) : the_row(); ?>

							<?php
								$font_size = get_sub_field( 'font_size' ); 
								$font_color = get_sub_field( 'font_color' ); 
								$underline = get_sub_field( 'underline' );
								$line_break = get_sub_field( 'line_break' );

								$classes = $font_size . ' ' . $font_color . ' ' . $underline . ' ' . $line_break;
							?>

							<span class="<?php echo $classes; ?>">
								<?php the_sub_field( 'line' ); ?>
							</span>

						<?php endwhile; ?>

					</<?php echo $header_tag; ?>>
					
	<?php endwhile; ?>
<?php endif; ?>
