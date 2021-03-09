<?php

	$style = get_sub_field('styles');
	$pane_counter = 0;

?>

<section class="block accordions <?php echo $style; ?>">
    <div class="wrapper">
        <div class="row">
            <div class="col">
				<ul data-accordion class="bx--accordion">

					<?php if ( have_rows( 'accordions' ) ) : ?>
						<?php while ( have_rows( 'accordions' ) ) : the_row(); ?>

						<?php 

							$title = get_sub_field( 'title' );
							$content = get_sub_field( 'content' );
							
							$pane_counter++; 
							
						?>

							<li data-accordion-item class="bx--accordion__item">
								<button class="bx--accordion__heading" aria-expanded="false" aria-controls="pane<?php echo $pane_counter; ?>">
									<div class="bx--accordion__arrow">
										<svg focusable="false" preserveAspectRatio="xMidYMid meet"
											style="will-change: transform;" xmlns="http://www.w3.org/2000/svg"
											class="bx--accordion__arrow-svg" width="16" height="16" viewBox="0 0 16 16"
											aria-hidden="true">
											<path d="M11 8L6 13 5.3 12.3 9.6 8 5.3 3.7 6 3z"></path>
										</svg>
										
										<?php echo ($style == 'style-2') ? 'Answer' : ''; ?>

									</div>
									<div class="bx--accordion__title"><?php echo $title; ?></div>
								</button>
								<div id="pane<?php echo $pane_counter; ?>" class="bx--accordion__content">

									<?php include( locate_template( 'blocks/components/buttons.php' ) ); ?>

									<?php echo $content; ?>

								</div>
							</li>

						<?php endwhile; ?>
					<?php endif; ?>

				</ul>
            </div>
        </div>
    </div>
</section>
