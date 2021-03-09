<?php get_header(); ?>

	<section class="block single person item">
		<article class="article">
			<div class="wrapper">
				<div class="row">
					<div class="col clearfix">
                        <?php $image = get_field( 'image' ); ?>
                        <?php if ( $image ) : ?>
                            <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                        <?php endif; ?>
                        <?php the_field( 'name' ); ?>
                        <?php the_field( 'position' ); ?>
                        <?php the_field( 'phone' ); ?>
                        <?php the_field( 'email' ); ?>
					</div>
				</div>
			</div>
		</article>
	</section>

	<?php if(acf_activated() && have_rows('blocks')) : ?>

		<?php while (acf_activated() && have_rows('blocks')) : the_row(); ?>
			<?php $block_type = get_row_layout(); ?>
			<?php include(locate_template('blocks/' . $block_type . '.php')); ?>
		<?php endwhile; ?>

	<?php endif; ?>

<?php get_footer(); ?>



<?php get_footer(); ?>
