<section class="block map">
    <div class="wrapper">
        <div class="row">
            <div class="col">

                <?php $google_map = get_sub_field( 'google_map' ); ?>

                <?php if ( $google_map ) : ?>
                    <div class="acf-map" data-zoom="16">
                        <div class="marker" data-lat="<?php echo esc_attr($google_map['lat']); ?>" data-lng="<?php echo esc_attr($google_map['lng']); ?>"></div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>
