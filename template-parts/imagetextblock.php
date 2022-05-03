<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');
 ?>
<section
    class="section-imagetext <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">
        <?php
                if( have_rows('blocks') ):
                while ( have_rows('blocks') ) : the_row();?>
        <?php $image = get_sub_field('image');
        $readMore = get_sub_field('add_read_more');
                $rowReverse = get_sub_field('reverse_layout'); ?>
        <div
            class="grid-item tile image-text-block <?php if($rowReverse == true): echo 'row-reverse'; else: echo 'row-default'; endif; ?>">
            <div class="image" style="background-image: url(<?php echo $image['sizes']['large']; ?>)">
            </div>
            <div class="simple-text-block">
                <div class="content-text">
                <?php
                if( have_rows('paragraphs') ):
                while ( have_rows('paragraphs') ) : the_row();
                $callOut = get_sub_field ('call_out');?>


                    <?php if($callOut == true):?>
                    <div class="call-out"><?php the_sub_field('text');?></div>
                    <?php else:?>
                    <?php the_sub_field('text');?>
                    <?php endif; ?>
                    <?php endwhile; endif;?>
                </div>
            </div>
        </div>
        <?php endwhile; endif;?>

    </div>
</section>