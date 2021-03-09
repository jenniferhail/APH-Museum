<?php if ( get_sub_field( 'enable_button' ) == 1 ) : ?>
    <?php if ( have_rows( 'buttons' ) ) : ?>

        <div class="buttons">    
            <?php while ( have_rows( 'buttons' ) ) : the_row(); ?>
                <?php $button = get_sub_field( 'button' ); ?>
                <?php if ( $button ) : ?>
                    <a class="btn bx--btn bx--btn--primary" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>"><?php echo esc_html( $button['title'] ); ?></a>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
        
    <?php endif; ?>
<?php endif; ?>