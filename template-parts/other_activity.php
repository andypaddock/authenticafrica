<?php $bgColor = get_sub_field('bg_colour');
$noMobile = get_sub_field('hide_on_mobile');?><section
    class="section-title <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>">
    <div class="row w40">


        <h2 class="heading-secondary">
            <span class="heading-secondary--sub">Other</span>
            <span class="heading-secondary--main">Experiences</span>

        </h2>


    </div>
</section>
<section
    class="other-activities-block <?php if($bgColor == true): echo 'alt-bg'; endif; ?> <?php the_sub_field('margin_size'); ?> <?php if($noMobile == true): echo 'no-mob'; endif; ?>"
    <?php if( get_sub_field('section_id') ): ?>id="<?php the_sub_field('section_id'); ?>" <?php endif; ?>>
    <div class="row <?php the_sub_field('column_size'); ?>">

        <?php
$loop = new WP_Query( array(
    'post_type' => 'activities',
    'posts_per_page' => 9,
    'post__not_in' => array( $post->ID )
  )
);
?>
<div class="image-card-container triple">
        <?php while ( $loop->have_posts() ) : $loop->the_post();
        $mainImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'large' ); ?>
        <div class="image-card" style="background-image: url('<?php echo $mainImage; ?>')">

            
                <a href="<?php the_permalink(); ?>">
                    <h2 class="heading-secondary">
                        <span class="heading-secondary--main"><?php the_title(); ?></span>
                    </h2>
                </a>
                <a class="button arrow" href="<?php the_permalink(); ?>">Find Out More<i
                        class="fa-light fa-chevron-right"></i></a>
            
        </div>
        <?php endwhile; wp_reset_query(); ?>
        </div>
    </div>
</section>