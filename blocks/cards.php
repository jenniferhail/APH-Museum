
<section class="block cards grid style-1">
    <div class="wrapper">
        <div class="row">
            <div class="col">

                <?php if(get_sub_field('heading')) : ?>

                    <div class="title-wrapper">
                        <h1 class="title h3"><?php the_sub_field('heading'); ?></h1>
                    </div>

                <?php endif; ?>

                <ul class="items">

                    <?php if ( have_rows( 'cards' ) ) : ?>
                        <?php while ( have_rows( 'cards' ) ) : the_row(); ?>

                            <li class="item">

                                <?php $image = get_sub_field( 'image' ); ?>

                                <?php if ( $image ) : ?>
                                    <div class="image" style="background-image:url(<?php echo esc_url( $image['url'] ); ?>); background-position: <?php the_sub_field( 'image_alignment' ); ?>">
                                        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" class="visually-hidden" />
                                    </div>
                                <?php endif; ?>

                                <div class="content">

                                    <h2 class="title"><?php the_sub_field( 'title' ); ?></h2>

                                    <?php if ( get_sub_field( 'subtitle' ) ) : ?>
                                        <p class="subtitle"><?php the_sub_field( 'subtitle' ); ?></p>
                                    <?php endif; ?>

                                    <?php the_sub_field( 'content' ); ?>

                                    <?php include( locate_template( 'blocks/components/buttons.php' ) ); ?>

                                </div>

                            </li>

                        <?php endwhile; ?>
                    <?php endif; ?>
                    
                </ul>
            </div>
        </div>
    </div>
</section>
