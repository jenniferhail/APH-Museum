<div class="item event">
    <div class="item-wrapper">

    <?php $image = get_field( 'image' ); ?>
        <?php if ($image) : ?>
            <div class="image" style="background-image:url(<?php echo esc_url( $image['url'] ); ?>); background-position: <?php the_sub_field( 'image_alignment' ); ?>">
                <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" class="visually-hidden" />
            </div>
        <?php endif; ?>

        <div class="text">
            <div class="meta">
                <h1 class="title h5">
                    <?php the_title(); ?>
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

                <p class="category">
                    <?php echo tax_names(get_the_ID(), 'event_categories'); ?>
                </p>

                <p class="location">
                    <?php echo tax_names(get_the_ID(), 'locations'); ?>
                </p>

                <p class="audience">
                    <?php echo tax_names(get_the_ID(), 'audience'); ?>
                </p>

                <div class="buttons">
                    <a href="<?php the_permalink(); ?>" class="btn">View event</a>
                </div>
            </div>
        </div>
    </div>
</div>
