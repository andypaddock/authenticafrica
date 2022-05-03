<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?><section
    class="section-title <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>">
    <div class="row w40">


        <h2 class="heading-secondary">
            <span class="heading-secondary--sub"><?php the_title(); ?></span>
            <span class="heading-secondary--main">Safari ideas</span>

        </h2>


    </div>
</section>
<section
    class="linked-itins <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">

    <div class="cards-container double">


<?php 

$args = array(
'post_type' => 'itineraries',
'order' => 'ASC',
'hide_empty' => false,
'meta_query' => array(
    array(
      'key'     => 'linked_activities',
      'value'   => $term_id,
      'compare' => 'LIKE'
    )
  )
);

$query = new WP_Query($args);

while ( $query->have_posts() ) : $query->the_post();
$mainImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'large' ); ?>

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
        <a class="button" href="<?php the_permalink(); ?>"><?php the_field('cta_text'); ?><i
                class="fa-light fa-chevron-right"></i></a>
    </div>
</div>
<?php endwhile; wp_reset_query(); ?>
</div>

    </div>
</section>