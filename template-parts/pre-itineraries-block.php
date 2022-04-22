<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?>
<section
    class="pre-itin-block <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">

        <?php
$loop = new WP_Query( array(
    'post_type' => 'itineraries',
    'posts_per_page' => 9,
    'post__not_in' => array( $post->ID )
  )
);
?>

        <?php while ( $loop->have_posts() ) : $loop->the_post();
        $mainImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'large' ); ?>
        <div class="itin-block tile">
            <div class="itin-image" style="background-image: url(<?php echo $mainImage; ?>)">

            </div>
            <div class="itin-text">
                <h3 class="heading-tertiary">
                    <span class="heading-tertiary--sub underscores">
                        <?php $terms = get_the_term_list( $post->ID, 'safaritype', '', ',' ); $terms = strip_tags( $terms ); 
if ($terms) {
echo ''.$terms.'';
} else  {
}

?>
                    </span>

                    <span class="heading-tertiary--main"><a
                            href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                </h3>
                <span class="days"><?php the_field( 'how_long' ); ?></span>
                <div class="destination-meta">
                    <div class="main"><?php $terms = get_the_terms( $post->ID, array('destination') ); ?>

                        <?php $terms = wp_get_post_terms( $post->ID , 'destination', array('parent'=>'0') );?>
                        <?php if( $terms ): ?>
                        <?php foreach( $terms as $term ): ?>
                        <span><?php echo esc_html( $term->name ); ?></span>
                        <?php endforeach; ?><?php endif; ?>
                    </div>
                    <div class="sub">

                        <?php 
$terms = wp_get_post_terms( $post->ID , 'destination', array('childless'=>'true') );
if( $terms ): ?>


                        <?php foreach( $terms as $term ):?>

                        <span><?php echo ( $term->name ); ?></span>
                        <?php endforeach; ?>

                        <?php endif; ?>
                    </div>
                </div>
                <div class="itin-destinations"></div>


            </div>
            <div class="itin-link"><a class="button outline"
                    href="<?php the_permalink(); ?>"><?php the_field( 'cta_text' ); ?><i
                        class="fa-light fa-chevron-right"></i></a></div>
        </div>

        <?php endwhile; wp_reset_query(); ?>

    </div>

    </div>
</section>