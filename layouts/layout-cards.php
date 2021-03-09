<?php
    $intro = get_sub_field('intro');
    $display_intro = $intro['display_intro'];
    $title = $intro['title'];
    $subtitle = $intro['subtitle'];
?>

<div class="layout cards">
    <div class="wrapper">
        <div class="content">

            <?php if ($display_intro): ?>
                <div class="intro">
                    <h2 class="title"><?php echo $title; ?></h2>
                    <?php if ($subtitle): ?>
                        <p class="subtitle"><?php echo $subtitle; ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if( have_rows('cards') ): ?>
            	<ul class="card-list">
            	<?php while( have_rows('cards') ): the_row(); ?>

            		<li class="card">
                        <h3 class="title"><?php the_sub_field('title'); ?></h3>
                        <div class="card-content">
                            <?php the_sub_field('content'); ?>
                        </div>
                        <?php include(locate_template('layouts/component-button.php')); ?>
            		</li>

            	<?php endwhile; ?>
            	</ul>
            <?php endif; ?>

        </div>
    </div>
</div>
