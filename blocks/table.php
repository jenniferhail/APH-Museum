<?php $style = get_sub_field('styles'); ?>

<section class="block table">
    <div class="wrapper">
        <div class="row">
            <div class="col">
                <div class="content">

                    <h2 class="title h4"><?php the_sub_field('table_title'); ?></h2>
                    <?php the_sub_field('table_description'); ?>

                </div>
                <div class="wrapper-table">
                    <table class="bx--data-table">

                        <?php if ($style == 'standard') : ?>
                            
                            <thead>
                                <tr>

                                <?php

                                    $col_count = count(get_sub_field('columns'));
                                    $span_heading = get_sub_field('columns')[0]['column_heading'];

                                ?>
                                    <!-- if "span_column_heading" tru/false is selected, desplay one header title across all columns -->
                                    <?php if ( get_sub_field('span_column_heading') == 1) : ?>

                                        <th colspan="<?php echo $col_count; ?>" style="text-align: center;">
                                            <span class="bx--table-header-label"><?php echo $span_heading; ?></span>
                                        </th>

                                    <?php else : ?>

                                        <?php if ( have_rows( 'columns' ) ) : ?>
                                            <?php while ( have_rows( 'columns' ) ) : the_row(); ?>
                                                <th>
                                                    <span class="bx--table-header-label"><?php the_sub_field( 'column_heading' ); ?></span>
                                                </th>
                                            <?php endwhile; ?>
                                        <?php endif; ?>

                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>

                                <?php if ( have_rows( 'rows' ) ) : ?>
                                    <?php while ( have_rows( 'rows' ) ) : the_row(); ?>

                                        <tr>

                                            <?php if ( have_rows( 'row_content' ) ) : ?>
                                                <?php while ( have_rows( 'row_content' ) ) : the_row(); ?>

                                                    <td>
                                                        <?php the_sub_field( 'content' ); ?>
                                                    </td>

                                                <?php endwhile; ?>
                                            <?php endif; ?>

                                        </tr>

                                    <?php endwhile; ?>
                                <?php endif; ?>

                            </tbody>

                        <?php elseif ($style == 'pricing') : ?>

                            <thead>
                                <tr>

                                    <?php if ( have_rows( 'pricing_columns' ) ) : ?>
                                        <?php while ( have_rows( 'pricing_columns' ) ) : the_row(); ?>

                                            <th>
                                                <span class="bx--table-header-label"><?php the_sub_field( 'pricing_column_heading' ); ?></span>
                                            </th>

                                        <?php endwhile; ?>
                                    <?php endif; ?>

                                </tr>
                            </thead>
                            <tbody>

                                <?php if ( have_rows( 'pricing_rows' ) ) : ?>
                                    <?php while ( have_rows( 'pricing_rows' ) ) : the_row(); ?>

                                        <tr>
                                            <?php $pricing_row_content = get_sub_field('pricing_row_content'); ?>
                                            <td>
                                                <?php echo $pricing_row_content[0]['pricing_info']; ?>
                                            </td>

                                            <td class="amount">
                                                <?php echo $pricing_row_content[1]['pricing_info']; ?>
                                            </td>
                                        </tr>

                                    <?php endwhile; ?>
                                <?php endif; ?>

                            </tbody>

                        <?php endif; ?>

                    </table>
                <div class="content">
                    <div class="buttons">

                        <?php include(locate_template('/blocks/components/buttons.php')); ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>