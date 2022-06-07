<?php $linkSwitch = get_field('force_display', 'options');?>
<?php if($linkSwitch == false): ?>
    <?php $bgColor = get_field('bg_colour', 'options');?>
<section class="site-wide-links <?php if($bgColor == true): echo 'alt-bg'; endif; ?>">
    
        <div class="row">
        <span class="browse-links">Or you could try browsing</span></div>
                        <div class="row">
                            <div class="image-card-container">
                                

                                <?php if( have_rows('link_block', 'options') ): ?>
                                <?php while( have_rows('link_block', 'options') ): the_row(); $linkImage = get_sub_field('image','options'); ?>
                                <div class="image-card" style="background-image: url(<?php echo $linkImage['sizes']['medium']; ?>)">
                                <h2 class="heading-secondary">
                        
                            <span
                                class="heading-secondary--main"><?php the_sub_field('heading', 'options'); ?></span>
                       
                    </h2>
                    <?php 
$link = get_sub_field('link', 'options');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
                                <a class="button outline" href="<?php echo esc_url( $link_url ); ?>"
                                    target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?><i
                                        class="fa-light fa-chevron-right"></i></a>
                                <?php endif; ?>

                                </div>
                                <?php endwhile; ?>
                                <?php endif; ?>

                            </div>
                        </div>
                   
                </section>
                <?php endif; ?>