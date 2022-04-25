<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="lrg-card-links <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">

        <?php if( have_rows('cards') ): ?>
        <div class="cards-container">
            <?php while( have_rows('cards') ): the_row(); 
        $image = get_sub_field('image');
        ?>
            <div class="card-wrapper">
                <div class="card-image" style="background-image: url(<?php echo $image['sizes']['large']; ?>)"></div>
                <div class="card-text">
                    <h2 class="heading-secondary">
                        <span class="heading-secondary--sub"><?php the_sub_field('sub_title'); ?></span>
                        <span class="heading-secondary--main"><?php the_sub_field('title'); ?></span>

                    </h2>



                </div>
                <div class="card-link"><?php 
$link = get_sub_field('link');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                    <a class="button <?php the_sub_field('link_style');?>" href="<?php echo esc_url( $link_url ); ?>"
                        target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><i
                            class="fa-light fa-chevron-right"></i></a>
                    <?php endif; ?>
                </div>



            </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
</section>