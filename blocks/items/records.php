<div class="item record">
    <div class="item-wrapper">
        <?php $image = get_field( 'image' ); ?>
            <?php if ($image) : ?>

                <div class="image" style="background-image:url(<?php echo esc_url( $image['url'] ); ?>);">
                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" class="visually-hidden" />
                </div>

            <?php else : ?>

                <div class="image placeholder"></div>
                
            <?php endif; ?>
        <div class="text">
            <div class="meta">
                <h1 class="title"><?php the_title(); ?></h1>
                <div class="buttons">
                    <a href="<?php the_permalink(); ?>" class="btn">View Record</a>
                </div>
            </div>
        </div>
    </div>
</div>