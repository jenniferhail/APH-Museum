<?php
    $args = array(
        'post_type' => 'record',
        'posts_per_page' => 10,
        'facetwp' => true,
    );
    $query = new WP_Query( $args );
?>

<?php if($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>
    <?php include( locate_template( 'blocks/items/records.php' ) ); ?>
<?php endwhile; endif; ?>