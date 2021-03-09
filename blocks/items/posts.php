<div class="item post">
    <div class="item-wrapper">
        <!-- Image -->
        <div class="image" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>); background-position: center; ?>">
            <?php the_post_thumbnail('post-thumbnail', ['class' => 'visually-hidden']); ?>
        </div>
        <div class="text">
            <div class="meta">
                <h2 class="title h5"><?php the_title(); ?></h2>
                <p class="date"><?php echo get_the_date(); ?></p>
                <p class="category"><?php echo tax_names(get_the_ID(), 'category'); ?></p>
                <p class="author"><?php the_author(); ?></p>
                <div class="buttons">
                    <a href="<?php the_permalink(); ?>" class="btn">Read article</a>
                </div>
            </div>
        </div>
    </div>
</div>
