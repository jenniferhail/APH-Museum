<section class="block timeline">
    <div class="wrapper">
        <div class="row">
            <div class="items">

                <?php if ( have_rows( 'timeline_event' ) ) : ?>
                    <?php while ( have_rows( 'timeline_event' ) ) : the_row(); ?>
                        <?php if (get_sub_field( 'enable_heading' )) : ?>

                            <div class="item">
                                <div class="col content">

                                    <h2 class="timeline-title"><?php the_sub_field('timeline_heading'); ?></h2>

                                </div>
                            </div>

                        <?php endif; ?>

                        <div class="item">
                            <div class="col content">

                                <h3 class="title"><?php the_sub_field( 'event_title' ); ?></h3>

                                <div class="details">
                                    <?php the_sub_field( 'event_description' ); ?>
                                </div>

                            </div>

                            <?php $event_images_images = get_sub_field( 'event_images' ); ?>
                            <?php if ( $event_images_images ) :  ?>
                                <div class="col media">
                                    <div class="glide">
                                        <div class="glide__track" data-glide-el="track">
                                            <ul class="glide__slides">

                                                <?php foreach ( $event_images_images as $event_images_image ): ?>

                                                    <li class="glide__slide"
                                                        data-src="<?php echo esc_url( $event_images_image['url'] ); ?>">
                                                        <img src='<?php echo esc_url( $event_images_image['url'] ); ?>'
                                                            alt="<?php echo esc_attr( $event_images_image['alt'] ); ?>" />
                                                    </li>

                                                <?php endforeach; ?>

                                            </ul>
                                        </div>
                                        
                                        <?php if ( count($event_images_images) > 1 ) : ?>

                                            <div class="glide__arrows" data-glide-el="controls">
                                                <button class="glide__arrow glide__arrow--left" data-glide-dir="<">Last Item</button>
                                                <button class="glide__arrow glide__arrow--right" data-glide-dir=">">Next Item</button>
                                            </div>

                                        <?php endif; ?>

                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

