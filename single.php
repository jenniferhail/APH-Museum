<?php get_header(); ?>

<section class="block single post">
    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        <div class="wrapper">
            <article class="article">

                <div class="image-wrapper">
                    <div class="image" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
                        <?php the_post_thumbnail('large', ['class' => 'visually-hidden']); ?>
                    </div>
                </div>

                <div class="text">
                    <div class="meta">
                        <h1 class="title h3"><?php the_title(); ?></h1>
                        <p class="date"><?php echo get_the_date(); ?></p>
                        <p class="category"><?php echo tax_names(get_the_ID(), 'category'); ?></p>     
                        <p class="author"><?php the_field( 'author' ); ?></p>
                    </div>

                    <div class="content">
                        <?php the_content(); ?>                    
                    </div>

                    <?php include( locate_template( 'blocks/components/share.php' ) ); ?>
                </div>
            </article>
        </div>
    <?php endwhile; endif; ?>
</section>

<?php
    $post_type = get_post_type(get_the_ID());
    $tax_query = null;
    if($post_type == 'event') {
        $tax_query = update_tax_query($tax_query, 'event_categories', get_the_terms(get_the_ID(), 'event_categories')[0]);
    }
    if($post_type == 'post') {
        $tax_query = update_tax_query($tax_query, 'category', get_the_terms(get_the_ID(), 'category')[0]);
    }
    $args = array(
        'post_type'         => $post_type,
        'posts_per_page'    => 3,
        'post__not_in'      => [get_the_ID()],
        'tax_query'         => $tax_query,
    );
    $query = new WP_Query( $args );
?>
<section class="block listing grid style-1">
    <div class="wrapper">
        <div class="row">
            <div class="col">
                <h3 class="related-title">Related Articles</h1>

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

<?php get_footer(); ?>