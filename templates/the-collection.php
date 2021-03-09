<?php
/* Template Name: The Collection */
get_header();
?>

<div class="component page-title">
    <div class="wrapper">
        <h1 class="title"><?php the_title(); ?></h1>
    </div>
</div>

<?php if(acf_activated() && have_rows('blocks')) : ?>
    <?php while (acf_activated() && have_rows('blocks')) : the_row(); ?>
        <?php $block_type = get_row_layout();?>
        <?php include(locate_template('blocks/' . $block_type . '.php')); ?>
    <?php endwhile; ?>
<?php endif; ?>

<section class="block listing grid style-1">
    <div class="wrapper">
        <div class="row">
            <div class="col">
                <?php get_template_part('inc/search/search-form'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="items">
                    <?php if (facetwp_activated()) : ?>
                        <?php get_template_part('inc/search/search-query'); ?>
                    <?php else : ?>
                        <h1>Error: FacetWP is not installed or activated.</h1>
                    <?php endif; ?>
                </div>
                <div class="load-more-btn">
                    <?php echo facetwp_display('facet', 'load_more'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
