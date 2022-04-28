<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="destination-season">
    <div class="row">
    <?php $queried_object = get_queried_object();
$term_id = $queried_object->term_id; ?>
    <?php $args = array( 'taxonomy' => 'destination', 'order' => 'ASC', 'hide_empty' => false, 'hierarchical' => true, // 'parent' => 0,
      'meta_query' => array(
        array(
          'key'     => 'when_to_go',
          'value'   => $term_id,
          'compare' => 'LIKE'
        )
      )
    
    
    );
    
    $terms = get_terms( $args );
    
    ?>
<div class="cards-container">
        <?php if ( ! empty( $terms ) && is_array( $terms ) ) {
    foreach ( $terms as $term ) { ?>
        <?php $styleImage = get_field('hero_image', $term); ?>
        <div class="card-wrapper tile">
        <a href="<?php echo esc_url(get_term_link($term)); ?>">
                    <div class="card-image" style="background-image: url(<?php echo $styleImage['url']; ?>)">

                    </div>
                </a>
                <div class="card-text">
                    <span class="meta"><?php the_field('sub_header',$term); ?></span>
                    <h2 class="heading-secondary">
                        <a href="<?php echo esc_url( get_term_link( $term ) ); ?>">
                            <span
                                class="heading-secondary--main underscores"><?php echo esc_html( $term->name ); ?></span>
                        </a>
                    </h2>
                    <p><?php the_field('short_description',$term); ?>test<?php echo ($term_id);?></p>
                </div>
                <div class="card-link">
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
