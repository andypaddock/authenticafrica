<?php
/**
 * The template for displaying all single posts
 *
 * @package authenticafrica
 */
get_header('header'); 

$term = get_queried_object();


// vars
$heroSize = get_field('hero_section_size', $term);
$color = get_field('color', $term);
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
<section class="read-more">
    <div class="row w40">

        <article><?php echo term_description(); ?></article>

    </div>
</section>

<?php get_template_part('template-parts/itin_type_filter');?>


<?php get_footer(); ?>