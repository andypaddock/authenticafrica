<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="destination-block <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">


    <?php $displayNumber = get_sub_field('number_to_display'); $terms = get_terms(
    array(
        'taxonomy'   => 'destination',
        'number' => $displayNumber,
        'hide_empty' => false,

    )
);?>
<div class="cust-post-grid tri-col">
        <?php if ( ! empty( $terms ) && is_array( $terms ) ) {
    foreach ( $terms as $term ) { ?>
        <?php $styleImage = get_field('hero_image', $term); ?>
        <div class="post-item tile">
        <a href="<?php echo esc_url(get_term_link($term)); ?>">
                    <div class="post-image" style="background-image: url(<?php echo $styleImage['url']; ?>)">

                    </div>
                </a>
                <div class="post-text">
                    <span class="meta"><?php the_field('sub_header',$term); ?></span>
                    <h2 class="heading-secondary">
                        <a href="<?php echo esc_url( get_term_link( $term ) ); ?>">
                            <span
                                class="heading-secondary--main underscores"><?php echo esc_html( $term->name ); ?></span>
                        </a>
                    </h2>
                    <p><?php the_field('short_description',$term); ?></p>
                </div>
                <div class="post-link">
                    <a class="button outline" href="<?php echo esc_url( get_term_link( $term ) ); ?>">
                        Find Out more<i class="fa-light fa-chevron-right"></i>
                    </a>
                </div>
       </div>
        <?php
    }
} ?>

</div>

    </div>

</section>