<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="section-seasons-block <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">

        <?php $terms = get_terms(
    array(
        'taxonomy'   => 'season',
        'hide_empty' => false,
        'parent'     => $term_id,
    )
);?>
        <?php if ( ! empty( $terms ) && is_array( $terms ) ) {
    foreach ( $terms as $term ) { ?>
        <?php $styleImage = get_field('hero_image', $term); ?>
        <div class="image-block" style="background-image: url(<?php echo $styleImage['url']; ?>)">

            <div class="style-text">
                <a href="<?php echo esc_url(get_term_link($term)); ?>">
                    <h2 class="heading-secondary">
                        <span class="heading-secondary--main"><?php echo esc_html($term->name); ?></span>
                    </h2>
                </a>
                <a class="arrow" href="<?php echo esc_url(get_term_link($term)); ?>"><i
                        class="fa-light fa-chevron-right"></i></a>
            </div>
        </div>
        <?php
    }
} ?>


    </div>
</section>