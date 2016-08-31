<?php
/*
 * Template Name: Services Page
 */
get_header();
$page_meta = get_post_meta($post->ID);
//pr($page_meta);
?>
<?php if (have_posts()) : the_post(); ?>
<div class="col-md-12">
    <div class="section-top">
        <h2><?php the_title(); ?></h2>
    </div>
</div>
<?php endif; ?>
<?php 
$featured_image_id = $page_meta['featured_image_ser_pg'][0];
$featured_image_src = wp_get_attachment_image_src($featured_image_id, 'full');
?>
<div class="common-height clearfix">
    <?php if($featured_image_src !=''){  ?>
    <div class="col-md-4 hidden-xs" style="height: 516px; 
         background: url(<?php echo $featured_image_src[0]; ?>) 50% 50% no-repeat; 
         background-size:cover;"></div>
    <?php } else { ?>
    <div class="col-md-4 hidden-xs" style="height: 516px; 
         background: url(<?php bloginfo('template_directory'); ?>/images/bg2.jpg) 50% 50% no-repeat; 
         background-size:cover;"></div>
    <?php } ?>
    <?php $services_ser_pg = $page_meta['services_ser_pg'][0]; 
        if($services_ser_pg > 0){
        ?>
    <div class="col-md-8" style="height: 516px;">
        <div class="max-height">
            <div class="row common-height grid-border clearfix">
                <?php for($i=0; $i<$services_ser_pg; $i++){ 
                                       $service_icon_hm = $page_meta['services_ser_pg_'.$i.'_service_icon_ser_pg'][0];
                                       $service_title_hm = $page_meta['services_ser_pg_'.$i.'_service_title_ser_pg'][0];
                                        ?>
                <div class="col-md-4 col-sm-6 col-padding" style="height: 258px;">
                    <div class="feature-box fbox-center fbox-dark fbox-plain fbox-small nobottomborder">
                        <div class="fbox-icon">
                            <?php if($service_icon_hm){ ?><a href=""><i class="fa <?php echo $service_icon_hm; ?>"></i></a><?php } ?>
                        </div>
                        <?php if($service_title_hm !=''){ echo '<h3>'.$service_title_hm.'</h3>'; } ?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
        <?php }  ?>
</div>
<?php get_footer(); ?>