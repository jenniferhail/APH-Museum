<?php
   $style = get_sub_field( 'styles' );
   $content_position = get_sub_field( 'content_position' );
   $square_color = get_sub_field( 'square_color' );
   $image = get_sub_field( 'image' );
   $images = get_sub_field( 'images' );
   $label = get_sub_field( 'label' );
   $large_title = get_sub_field( 'large_title' );
   $content = get_sub_field( 'content' );
?>

<!-- Styles 1, 2, & 4 -->
<?php if ( $style == 'style-1' || $style == 'style-2' || $style == 'style-4' ) : ?>
   <section class="block hero <?php echo $style; ?> <?php echo $content_position; ?>">
      <div class="wrapper">
         <div class="row">
            <div class="titles">
               <div class="title-wrapper">
                  <div class="inner">
                     <?php if ( $style != 'style-4' ) : ?>
                        <?php if ( $label['text'] ) : ?>
                           <?php include(locate_template('blocks/components/label.php')); ?>
                        <?php endif; ?>
                     <?php endif; ?>

                     <?php include(locate_template('blocks/components/large-title.php')); ?>
                  </div>
               </div>
            </div>

            <div class="content">
               <div class="content-wrapper">
                  <div class="inner">

                     <?php echo $content; ?>

                     <?php include(locate_template('blocks/components/buttons.php')); ?>

                     <?php if ( get_sub_field('attach_event') == 1 ) : ?>

                        <div class="item event">
                           <div class="item-wrapper">
                              <div class="text">
                                 <div class="meta">

                                    <?php $event = get_sub_field( 'event' ); ?>
                                    <?php if ( $event ) : ?>
                                       <?php foreach ( $event as $post ) : ?>
                                          <?php setup_postdata ( $post ); ?>
                                          <h1 class="title p">
                                             <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                          </h1>
                                          <p class="date">
                                             <?php 
                                                $start_date = get_field( 'start_date' );
                                                $start_date_html = get_custom_date($start_date, 'Ymd', 'Y-m-d');
                                                $start_date_display = get_custom_date($start_date, 'Ymd', 'F d, Y');

                                                $start_time = get_field('start_time');
                                                $start_time_html = get_custom_time( $start_time, 'H:i:s', 'H:i');
                                                $start_time_display = get_custom_time(get_field('start_time'), 'H:i:s', 'g:i A');
                                             ?>

                                             <time datetime="<?php echo $start_date_html; ?>"><?php echo $start_date_display; ?></time>
                                             <time datetime="<?php echo $start_time_html; ?>"><?php echo $start_time_display; ?></time>
                                          </p>                                    
                                       <?php endforeach; ?>
                                       <?php wp_reset_postdata(); ?>
                                    <?php endif; ?>

                                 </div>
                              </div>
                           </div>
                        </div>
                        
                     <?php endif; ?>

                  </div>
               </div>
               
            </div>
            <div class="image-wrapper">

               <?php if ( $image ) : ?>
                  <div class="image" style="background-image:url(<?php echo $image['url']; ?>); background-size: <?php the_sub_field( 'image_size' ); ?>;" >
                     <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $background_image['alt'] ); ?>" class="visually-hidden" />
                  </div>
               <?php endif; ?>

            </div>
         </div>
      </div>
   </section>
<?php endif; ?>

<!-- Style 3 -->
<?php if ( $style == 'style-3') : ?>
   <section class="block hero <?php echo $style; ?>">
      <div class="wrapper">
         <div class="row">
            <div class="col">
               <div class="image-wrapper">

                  <?php if ( $images ) : ?>
                     <?php foreach ( $images as $image ): ?>
                        <div class="image" style="background-image:url(<?php echo $image['url']; ?>); background-size: <?php the_sub_field( 'image_size' ); ?>;" >
                           <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $background_image['alt'] ); ?>" class="visually-hidden" />
                        </div>
                     <?php endforeach; ?> 
                  <?php endif; ?>  

               </div>
               <div class="content">

                  <?php include(locate_template('blocks/components/large-title.php')); ?>

                  <?php echo $content; ?>

                  <?php include(locate_template('blocks/components/buttons.php')); ?>

               </div>
            </div>
         </div>
      </div>
   </section>
<?php endif; ?>

