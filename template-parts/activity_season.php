<section class="linked-activity-block">
    <div class="row">


        <div class="cards-container">


            <?php 

$terms = wp_get_post_terms( $post->ID, 'season'); 
$terms_ids = [];

foreach ( $terms as $term ) {
    $terms_ids[] = $term->term_id;
}

$args = array(
    'post_type' => 'activities',
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

            <div class="card-wrapper tile">

                <div class="card-image" style="background-image: url(<?php echo $mainImage; ?>)">
                </div>
                <div class="card-text">
                    <h3 class="heading-tertiary">
                        <span class="heading-tertiary--sub">
                            <?php echo taxonomy_hierarchy(); ?>
                        </span>

                        <span class="heading-tertiary--main underscores"><a
                                href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                    </h3>
                </div>
                <div class="card-link">
                    <a class="button" href="<?php the_permalink(); ?>">Find out more<i
                            class="fa-light fa-chevron-right"></i></a>
                </div>
            </div>
            <?php }
}
?>
        </div>
    </div>
</section>