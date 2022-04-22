<?php
/**
 * The template for displaying all single posts
 *
 * @package authenticafrica
 */
get_header(); 

$term = get_queried_object();


// vars
$heroSize = get_field('hero_section_size', $term);
$color = get_field('color', $term);
$mapImage = get_field('destination_map', $term);
$term_id = $term->term_id;
?>

<!--closes in footer.php-->

<?php if (!is_front_page()): ?>
<div class="breadcrumb"><?php if( function_exists( 'bcn_display' ) ) bcn_display(); ?></div>
<div class="header__text-box">
    <h1 class="heading-primary">
        <span class="heading-primary--sub"><?php the_field('sub_header', $term); ?></span>
        <span class="heading-primary--main"><?php echo single_term_title(); ?></span>
    </h1>
    <div class="down_arrow">
        <div class="arrow bounce">
            <a class="fal fa-chevron-down fa-3x" href="#content"></a>
        </div>
    </div>
</div>
<?php endif; ?>
<span id="content"></span>
<section>
    <div class="row w40">
        <article class="count1"><?php echo term_description(); ?></article>
    </div>
</section>




<?php $bgColor = get_field('bg_colour');
$noMobile = get_field('hide_on_mobile');
$titleStyle = get_field ('style');?>
<section
    class="simple-text <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_field('section_id') ): ?>id="<?php the_field('section_id'); ?>" <?php endif; ?>>
    <div class="row w40">

        <div class="simple-text-block">
            <div class="text">
                <div class="title">
                    <?php if($titleStyle == "h2"):?>
                    <h3 class="heading-secondary underscores"><?php the_field('title', $term);?></h3>
                    <?php elseif($titleStyle == "h3"):?>
                    <h3 class="heading-tertiary overscores"><?php the_field('title', $term);?></h3>
                    <?php endif; ?>
                </div>
                <div class="content-text">
                    <?php
                if( have_rows('paragraphs', $term) ):
                while ( have_rows('paragraphs') ) : the_row();
                $callOut = get_sub_field ('call_out', $term);?>


                    <?php if($callOut == true):?>
                    <div class="call-out"><?php the_sub_field('text_block', $term);?></div>
                    <?php else:?>
                    <?php the_sub_field('text_block', $term);?>
                    <?php endif; ?>
                    <?php endwhile; endif;?>
                </div>
            </div>
        </div>


    </div>
</section>




<section class="section-title" id="gallery">
    <div class="row centre-line w50">
        <div class="line"></div>
        <div></div>
    </div>
    <div class="row w40">
        <h2 class="heading-secondary">
            <span class="heading-secondary--sub"><?php echo single_term_title(); ?></span>
            <span class="heading-secondary--main"><?php the_field('gallery_title', $term); ?></span>
        </h2>
    </div>
</section>


<section class="gallery">
    <div class="row">
        <?php 
$images = get_field('upload_images', $term);
if( $images ): ?>
        <div id="parent">
            <?php foreach( $images as $image ): ?>
            <div class="child limit-six">
                <a href="<?php echo esc_url($image['url']); ?>">
                    <img src="<?php echo esc_url($image['sizes']['large']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>" />
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <div class="row centre-line w50">
            <div class="line"></div>
            <div></div>

        </div>
        <a id="viewAll" class="view-more-btn" href="#">View More</a>
    </div>
</section>

<section class="section-title" id="areas">
    <div class="row centre-line w50">
        <div class="line"></div>
        <div></div>
    </div>
    <div class="row w40">
        <h2 class="heading-secondary">
            <span class="heading-secondary--sub"><?php echo single_term_title(); ?></span>
            <span class="heading-secondary--main">When to go</span>
        </h2>
    </div>
</section>
<section class="when-to-go">
    <div class="row w80">
        <?php 
$terms = get_field('when_to_go');
if( $terms ): ?>
        <div class="prop-slider switch owl-carousel owl-theme">
            <?php foreach( $terms as $term ): ?>
            <div class="property-style-block ">
                <?php $styleImage = get_field('hero_image', $term); ?>
                <div class="style-text">
                    <h2 class="heading-secondary underscores"><?php echo esc_html($term->name); ?></h2>
                    <p><?php echo esc_html( $term->description ); ?></p>
                </div>
                <div class="style-image" style="background-image: url(<?php echo $styleImage['url']; ?>)">

                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

    </div>
</section>




<?php if($term->parent == 0):?>


<section class="section-property-styles"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row">

        <div class="prop-slider owl-carousel owl-theme">

            <?php $terms = get_terms(
    array(
        'taxonomy'   => 'destination',
        'hide_empty' => false,
        'parent'     => $term_id,
    )
);?>
            <?php if ( ! empty( $terms ) && is_array( $terms ) ) {
    foreach ( $terms as $term ) { ?>
            <div class="property-style-block">
                <?php $styleImage = get_field('hero_image', $term); ?>
                <div class="style-text">
                    <h2 class="heading-secondary underscores">

                        <span class="heading-secondary--main"><?php echo esc_html($term->name); ?></span>
                        <span class="heading-secondary--sub light"><?php
$parent = get_term_by( 'id', $term->parent, get_query_var( 'taxonomy' ) );
if($parent):
    echo $parent->name;
endif;
?></span>
                    </h2>

                    <p><?php the_field('short_description', $term); ?></p>
                    <a class="button outline" href="<?php echo esc_url(get_term_link($term)); ?>">Find Out More<i
                            class="fa-light fa-chevron-right"></i></a>
                </div>
                <div class="style-image" style="background-image: url(<?php echo $styleImage['url']; ?>)">

                </div>
            </div>
            <?php
    }
} ?>



        </div>
    </div>
</section>
<?php endif; ?>

<section class="section-title alt-bg" id="other-destinations">
    <div class="row centre-line w50">
        <div class="line"></div>
        <div></div>
    </div>
    <div class="row w40">
        <h2 class="heading-secondary">
            <span class="heading-secondary--sub">Other</span>
            <span class="heading-secondary--main">Destinations</span>
        </h2>
    </div>
</section>


<section class="destination-block alt-bg" id="<?php the_sub_field('section_id'); ?>">

    <div class="row <?php the_sub_field('column_size'); ?>">

        <div class="cust-post-grid tri-col">

            <?php $terms = get_terms( array(
                        'taxonomy' => 'destination',
                        'exclude' => $term_id,
					    'hide_empty' => false,
					) ); ?>

            <?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ): ?>



            <?php foreach ( $terms as $term ): ?>

            <?php $destImage = get_field('hero_image',$term); ?>
            <div class="post-item tile <?php echo ' ' . $term->slug; ?>">
                <a href="<?php echo esc_url( get_term_link( $term ) ); ?>">
                    <div class="post-image" style="background-image: url(<?php echo $destImage['url']; ?>)">

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

            <?php endforeach; ?>



            <?php endif; ?>






            <?php 
$destinations = get_sub_field('select_dest_block_items');
if( $destinations ): ?>
            <?php foreach( $destinations as $destination ): ?>
            <?php $destImage = get_field('hero_image',$destination); ?>
            <div class="post-item tile <?php echo ' ' . $destination->slug; ?>">
                <a href="<?php echo esc_url( get_term_link( $destination ) ); ?>">
                    <div class="post-image" style="background-image: url(<?php echo $destImage['url']; ?>)">

                    </div>
                </a>
                <div class="post-text">
                    <span class="meta"><?php the_field('sub_header',$destination); ?></span>
                    <h2 class="heading-secondary">
                        <a href="<?php echo esc_url( get_term_link( $destination ) ); ?>">
                            <span
                                class="heading-secondary--main underscores"><?php echo esc_html( $destination->name ); ?></span>
                        </a>
                    </h2>
                    <p><?php the_field('short_description',$destination); ?></p>
                </div>
                <div class="post-link">
                    <a class="button outline" href="<?php echo esc_url( get_term_link( $destination ) ); ?>">
                        Find Out more<i class="fa-light fa-chevron-right"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

    </div>

</section>










<section class="lodges">
    <div class="row">
        <div class="itin-display-block grid-layout3">
            <?php
                $args = array(
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'destination',
                        ),
                    )
                );
                $query = new WP_Query( $args );
                if ( $query->have_posts() ): while ( $query->have_posts() ):
                $query->the_post();
                $campImage = get_sub_field('hero_image');?>


            <div class="itinerary-item tile">
                <div class="itin-item-image"
                    style="background-image: url(<?php if ($campImage): ?><?php echo $campImage['url']; ?><?php else: ?><?php echo get_the_post_thumbnail_url($post->ID,'large'); ?><?php endif ?>)">

                </div>

                <div class="itin-item-text">
                    <h3 class="heading-tertiary">
                        <span class="heading-tertiary--sub">
                            <?php $terms = get_the_term_list( $post->ID, 'destination', '' ,  ' > ' ); $terms = strip_tags( $terms ); 
if ($terms) {
echo ''.$terms.'';
} else  {
}

?>
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


            <!--item-->
            <?php endwhile; endif;?>
        </div>
    </div>
</section>


<section class="section-title" id="itineraries">
    <div class="row centre-line w50">
        <div class="line"></div>
        <div></div>
    </div>
    <div class="row w40">
        <h2 class="heading-secondary">
            <span class="heading-secondary--sub"><?php the_field('itins_sub_title', $term); ?></span>
            <span class="heading-secondary--main"><?php echo single_term_title(); ?> Itineraries</span>
        </h2>
    </div>
</section>


<section class="itineraries">
    <div class="row w80">
        <div class="itin-display-block grid-layout2">
            <?php
                $args = array(
                    'post_type' => 'itineraries',
                    'tax_query' => array(
                    'relation' => 'AND',
                        array(
                            'taxonomy' => 'destination',
                            'field' => 'slug',
                            'terms' => array( $term->slug )
                        ),
                    )
                );
                $query = new WP_Query( $args );
                if ( $query->have_posts() ): while ( $query->have_posts() ):
                $query->the_post();
                $campImage = get_field('hero_image');?>


            <div class="itinerary-item tile">
                <div class="itin-item-image"
                    style="background-image: url(<?php if ($campImage): ?><?php echo $campImage['url']; ?><?php else: ?><?php echo get_the_post_thumbnail_url($post->ID,'large'); ?><?php endif ?>)">

                </div>

                <div class="itin-item-text">
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
                        <div class="main">
                            <?php $terms = get_the_terms( $post->ID, array( 'destination') ); ?>
                            <?php foreach ( $terms as $term ) : ?>
                            <?php $placeType = get_field('dest_type', $term); if ($placeType == 'country'):?>
                            <span><?php echo $term->name; ?></span>
                            <?php endif;?>
                            <?php endforeach; ?>
                        </div>
                        <div class="sub">
                            <?php foreach ( $terms as $term ) : ?>
                            <?php $placeType = get_field('dest_type', $term); if ($placeType == 'placecamp'):?>
                            <span><?php echo $term->name; ?></span>
                            <?php endif;?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="itin-item-link">
                    <a class="button outline" href="<?php the_permalink(); ?>"><?php the_field( 'cta_text' ); ?><i
                            class="fa-light fa-chevron-right"></i></a>
                </div>
            </div>


            <!--item-->
            <?php endwhile; endif;?>
        </div>
    </div>
</section>

<?php if( !empty( $mapImage ) ): ?>
<section class="section-title" id="map">
    <div class="row centre-line w50">
        <div class="line"></div>
        <div></div>
    </div>
    <div class="row w40">
        <h2 class="heading-secondary">
            <span class="heading-secondary--sub"><?php the_field('map_sub_title', $term); ?></span>
            <span class="heading-secondary--main"><?php echo single_term_title(); ?> Map</span>
        </h2>
    </div>
</section>
<section class="section-map">

    <div class="row">
        <a class="image-popup-no-margins" href="<?php echo $mapImage['url']; ?>">
            <img src="<?php echo $mapImage['sizes']['large']; ?>" alt="<?php echo $mapImage['alt']; ?>" />
        </a>

    </div>
</section>
<?php endif; ?>



<?php get_footer(); ?>