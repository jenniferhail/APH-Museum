<?php
    $style = get_sub_field('styles');
?>

<section class="block basic-content <?php echo $style; ?> <?php the_sub_field('alignment'); ?>">
    <?php if ($style == 'style-1') : ?>

        <div class="wrapper">
            <h1 class="label h3"><?php the_sub_field( 'label' ); ?></h1>
            <div class="row">          

                <div class="col">

                    <?php if(have_rows('heading')) : while(have_rows('heading')) : the_row(); ?>
                        <?php include( locate_template( 'blocks/components/large-title.php' ) ); ?>
                    <?php endwhile; endif; ?>

                    <?php the_sub_field( 'content' ); ?>

                    <?php if (have_rows( 'basic_content_buttons' )) : while (have_rows( 'basic_content_buttons' )) : the_row();?>
                        
                        <?php if ( get_sub_field( 'enable_button' ) == 1 ) : ?>

                            <?php if ( have_rows( 'buttons' ) ) : ?>
                                <div class="buttons">    
                                    <?php while ( have_rows( 'buttons' ) ) : the_row(); ?>
                                        <?php $button = get_sub_field( 'button' ); ?>
                                        <?php if ( $button ) : ?>
                                            <a class="btn" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>"><?php echo esc_html( $button['title'] ); ?></a>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>

                        <?php endif; ?>
                    <?php endwhile; endif; ?>

                </div>
            </div>
        </div>

    <?php elseif ($style == 'style-2') : ?>

        <div class="wrapper">
            <div class="row">
            
                <?php if ( have_rows( 'columns' ) ) : ?>
                    <?php while ( have_rows( 'columns' ) ) : the_row(); ?>
                        <div class="col">

                            <?php include( locate_template( 'blocks/components/large-title.php' ) ); ?>

                            <?php the_sub_field( 'content' ); ?>
                            
                            <?php include( locate_template( 'blocks/components/buttons.php' ) ); ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
        </div>

    <?php endif; ?>

</section>