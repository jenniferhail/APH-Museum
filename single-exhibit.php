<?php get_header(); ?>

<section class="block exhibit animate">
    <div class="wrapper">
        <div class="row">
            <div class="navigation">
                <h1 class="title"><span class="underline"><?php the_title(); ?></span></h1>

                <?php
                    global $post;
                    $table_of_contents = table_of_contents('exhibit');
                    $table_of_contents_nav = table_of_contents_nav('exhibit');
                ?>

                <?php if($table_of_contents_nav) : ?>
                    
                    <nav class="child-nav buttons">
                        <?php if($table_of_contents_nav['previous']) : ?>
                            <a href="<?php the_permalink($table_of_contents_nav['previous']); ?>">
                                <button class="prev btn bx--btn bx--btn--primary">Previous</button>
                            </a>
                        <?php endif; ?>

                        <?php if($table_of_contents_nav['next']) : ?>
                            <a href="<?php the_permalink($table_of_contents_nav['next']); ?>">
                                <button class="next btn bx--btn bx--btn--primary">Next</button>
                            </a>
                        <?php endif; ?>
                    </nav>

                <?php endif; ?>

                <nav class="table-of-contents" aria-expanded="false">
                    <button class="button">Table of Contents</button>
                    <ul class="items">

                        <?php foreach ($table_of_contents as $key => $value) : ?>
                            <?php
                                $classes = 'item ' . $value->ID;
                                if($post->ID == $value->ID) {
                                    $classes .= ' current-page';
                                }
                            ?>
                            <li class="<?php echo $classes; ?>"><a href="<?php the_permalink($value->ID); ?>"><?php echo $value->post_title; ?></a></li>
                        <?php endforeach; ?>

                    </ul>
                </nav>

            </div>
        </div>
    </div>
</section>

<?php if(acf_activated() && have_rows('blocks')) : ?>

    <?php while (acf_activated() && have_rows('blocks')) : the_row(); ?>
        <?php $block_type = get_row_layout();?>
        <?php include(locate_template('blocks/' . $block_type . '.php')); ?>
    <?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>
