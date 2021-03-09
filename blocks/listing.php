<?php
    $post_type = get_sub_field( 'post_type' );
    $posts_per_page = get_sub_field( 'number_to_show' );
    $order = get_sub_field( 'display_order' );
    $orderby = get_sub_field( 'order_by' );
    $tax_query = ['relation' => 'OR'];

    if($post_type == 'event') {
        if (get_sub_field( 'audience' )) {
            $tax_query = update_tax_query($tax_query, 'audience', get_sub_field( 'audience' ));
        }
        if (get_sub_field( 'location' )) {
            $tax_query = update_tax_query($tax_query, 'location', get_sub_field( 'location' ));
        }
        if (get_sub_field( 'event_categories' )) {
            $tax_query = update_tax_query($tax_query, 'event_categories', get_sub_field( 'event_categories' ));
        }
    }

    $args = array(
        'post_type'          => $post_type,
        'posts_per_page'     => $posts_per_page,
        'order'              => $order,
        'orderby'            => $orderby,
        'tax_query'          => [$tax_query],
    );
    $query = new WP_Query( $args );
?>

<section class="block listing grid style-1">
    <div class="wrapper">

        <?php if(get_sub_field('enable_front_end_filters') == 1 && get_sub_field('event_filters') && $post_type == 'event'): ?>
            <?php event_filters(); ?>
        <?php endif; ?>

        <div class="row">
            <div class="col">
                <div class="items">

                    <?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>

                        <?php
                            switch ($post_type) {
                                case 'post':
                                    include(locate_template('blocks/items/posts.php'));
                                    break;
                                
                                case 'event':
                                    include(locate_template('blocks/items/events.php'));
                                    break;
                                
                                case 'record':
                                    include(locate_template('blocks/items/records.php'));
                                    break;
                            }
                        ?>
                        
                    <?php endwhile; endif; ?>
                    <?php wp_reset_postdata(); ?>
                    
                </div>
            </div>
        </div>
    </div>
</section>
