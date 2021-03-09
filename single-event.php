<?php get_header(); ?>

<section class="block single event">
    <div class="wrapper">
        <article class="article">
            <div class="image-wrapper">

				<?php $image = get_field( 'image' ); ?>
				<?php if ( $image ) : ?>
					<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
				<?php endif; ?>

			</div>
            <div class="text">
                <div class="meta">
                    <h1 class="title h3"><?php the_title(); ?></h1>

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
                </div>
                <div class="content">
					<?php the_field('content'); ?>

					<?php if (get_field('enable_rsvp') == 1) : ?>
						<div class="buttons">    
							<a class="btn" href="<?php echo the_field('rsvp_link'); ?>">RSVP Now</a>
						</div>
					<?php endif; ?>
					
                </div>
                
                <?php include( locate_template( 'blocks/components/share.php' ) ); ?>
            </div>
        </article>
    </div>
</section>

<?php if(acf_activated() && have_rows('blocks')) : ?>

	<?php while (acf_activated() && have_rows('blocks')) : the_row(); ?>
		<?php $block_type = get_row_layout(); ?>
		<?php include(locate_template('blocks/' . $block_type . '.php')); ?>
	<?php endwhile; ?>

<?php endif; ?>

<?php
    $post_type = get_post_type(get_the_ID());
    $tax_query = null;
    if($post_type == 'event') {
        $tax_query = update_tax_query($tax_query, 'event_categories', get_the_terms(get_the_ID(), 'event_categories')[0]);
    }
    if($post_type == 'post') {
        $tax_query = update_tax_query($tax_query, 'categories', get_the_terms(get_the_ID(), 'category')[0]);
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
                <h3 class="related-title">Related Events</h1>

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
