<?php $heroImage = get_field('hero_image'); 
$heroVideo = get_field('background_video');
$heroMobile = get_field('mobile_video');
$heroPoster = get_field('video_poster');?>
<?php $heroSwitch = get_field('hero_type');
            if ($heroSwitch == 'video'): ?>


<div class="hero tester imageoff-<?php the_field('image_offset');?>">
    <video playsinline autoplay muted loop poster="<?php echo $heroPoster['url'];?>" id="bgvideo">
        <?php if ($heroMobile): ?>
        <source src="<?php echo $heroMobile['url'];?>" type="video/mp4" media="all and (max-width: 480px)">
        <?php endif; ?>
        <source src="<?php echo $heroVideo['url'];?>" type="video/mp4">
    </video>
    <div class="header__text-box">
        <h1 class="heading-<?php the_field('header_size'); ?>">
            <span class="heading-<?php the_field('header_size'); ?>--main"><?php the_field('header'); ?></span>
            <span class="heading-<?php the_field('header_size'); ?>--sub"><?php the_field('sub_header'); ?></span>
        </h1>
    </div>
</div>

<?php elseif ($heroSwitch == 'image'):?>
<div class="hero tester imageoff-<?php the_field('image_offset');?>"
    style="background-image: url(<?php echo $heroImage['url']; ?>)">
    <div class="header__text-box">
        <h1 class="heading-<?php the_field('header_size'); ?>">
            <span class="heading-<?php the_field('header_size'); ?>--main"><?php the_field('header'); ?></span>
            <span class="heading-<?php the_field('header_size'); ?>--sub"><?php the_field('sub_header'); ?></span>
        </h1>
    </div>
</div>
<?php endif;?>
<div class="breadcrumb"><?php if( function_exists( 'bcn_display' ) ) bcn_display(); ?></div>