<section class="itinerary-season-block">
    <div class="row">


        <div class="safaritype-grid filter-grid">


            <?php 

$terms = wp_get_post_terms( $post->ID, 'season'); 
$terms_ids = [];

foreach ( $terms as $term ) {
    $terms_ids[] = $term->term_id;
}

$args = array(
    'post_type' => 'itineraries',
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'season',
            'field'    => 'term_id',
            'terms'    => $terms_ids
        )
    ),
);

$query = new WP_Query($args);

if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post(); ?>

            <?php $mainImage = get_the_post_thumbnail_url(get_the_ID(),'large'); ?>

            <div class="mix tile filter-item">

                <div class="filter-item--image" style="background-image: url(<?php echo $mainImage; ?>)">
                </div>
                <div class="filter-item--text">
                    <h3 class="heading-tertiary">
                        <span class="heading-tertiary--sub">
                            <?php echo taxonomy_hierarchy(); ?>
                        </span>

                        <span class="heading-tertiary--main"><a
                                href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                    </h3>
                    <div class="right_arrow">
                        <div class="arrow bounce">
                            <a class="fal fa-chevron-right fa-2x" href="<?php the_permalink(); ?>"></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
}
?>








            <!-- <?php $terms = get_the_terms( $post->ID , 'season' );?>
            <?php if ( $terms != null ){
foreach( $terms as $term ) {
$term_link = get_term_link( $term, 'season' );
$mainImage = get_the_post_thumbnail_url(get_the_ID(),'large'); ?>

            <div class="mix tile filter-item">

                <div class="filter-item--image" style="background-image: url(<?php echo $mainImage; ?>)">
                </div>
                <div class="filter-item--text">
                    <h3 class="heading-tertiary">
                        <span class="heading-tertiary--sub">
                            <?php echo taxonomy_hierarchy(); ?>
                        </span>

                        <span class="heading-tertiary--main"><a
                                href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                    </h3>
                    <div class="right_arrow">
                        <div class="arrow bounce">
                            <a class="fal fa-chevron-right fa-2x" href="<?php the_permalink(); ?>"></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php unset($term); } } ?> -->
        </div>
    </div>
</section>