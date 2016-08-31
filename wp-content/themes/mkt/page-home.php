<?php
/*
 * Template Name: Home Page
 */
get_header();
$page_meta = get_post_meta($post->ID);
//pr($page_meta);
?>
<!-- Slider -->
<?php  $parallax_img_sec_hm_id = $page_meta['parallax_img_sec_hm'][0];                            
       $parallax_img_sec_hm_src = wp_get_attachment_image_src($parallax_img_sec_hm_id, 'full');  ?>
<section id="slider" class="slider-parallax full-screen" style="height: 620px; transform: translate(0px, 0px);">
    <div class="full-screen dark section nopadding nomargin noborder ohidden" style="height:620px; 
         background-image: url(<?php echo$parallax_img_sec_hm_src[0] ; ?>); 
         /*background-size: cover; background-position: 50% 50%;*/
         background-color:#566573; background-repeat: no-repeat;
                 background-position: center;  background-size: cover; 
         ">
        <div class="row nomargin" style="position: relative; z-index: 2;">
            <div class="col-md-offset-7 col-md-5 full-screen" style="height: 620px; background-color: rgba(0, 0, 0, 0.45098);">
                <div class="vertical-middle col-padding" style="position: absolute; top: 50%; width: 100%; padding-top: 0px; padding-bottom: 0px; margin-top: -143.5px; opacity: 2.22222;">
                    <div class="heading-block nobottomborder bottommargin-sm">
                        <?php $heading_subscribe_frm_hm = $page_meta['heading_subscribe_frm_hm'][0];
                        $sub_heading_subscribe_frm_hm =$page_meta['sub_heading_subscribe_frm_hm'][0];
                        if($heading_subscribe_frm_hm !=''){
                        ?>
                        <h1 style="font-size: 22px;"><?php echo $heading_subscribe_frm_hm;  ?></h1>
                            <?php } ?>
                        <?php if($sub_heading_subscribe_frm_hm !=''){?>
                        <span style="font-size: 16px;" class="t300 capitalize ls1 notopmargin"><?php echo $heading_subscribe_frm_hm;  ?></span><?php } ?>
                    </div>
                    <?php 
                    $subscribe_frm_shortcode_top_hm = $page_meta['subscribe_frm_shortcode_top_hm'][0];
//      $form_shortcode = '[contact-form-7 id="4" title="Contact form" html_id="template-contactform"]';
              if($subscribe_frm_shortcode_top_hm !=''){   echo do_shortcode($subscribe_frm_shortcode_top_hm); } 
                    ?>     
<!--                    <form action="#" class="clearfix" style="max-width: 300px;">
                        <div class="col_full">
                            <label class="capitalize t600">Name</label>
                            <input type="text" id="template-op-form-password" name="template-op-form-password" value="" class="form-control not-dark">
                        </div>
                        <div class="col_full">
                            <label  class="capitalize t600">Email</label>
                            <input type="email" id="template-op-form-email" name="template-op-form-email" value="" class="form-control not-dark">
                        </div>                        
                        <div class="col_full nobottommargin">
                            <button type="submit" class="t400 capitalize button button-border button-light button-circle nomargin" value="submit">Subscribe Now</button>
                        </div>
                    </form>                    -->
                </div>
                <a href="" data-scrollto="#section-about" data-easing="easeInOutExpo" data-speed="1250" data-offset="65" class="one-page-arrow dark"><i class="fa fa-angle-down infinite animated fadeInDown"></i></a>
            </div>
        </div>
        <div class="video-wrap" style="z-index:1;">
            <div class="video-overlay" style="background: rgba(0,0,0,0.2);"></div>
        </div>
    </div>
</section><!-- #slider end -->
<!-- Content -->
<section id="content" style="margin-bottom: 0px;">
    <div class="content-wrap nopadding">
        <div id="section-about" class="center page-section">
            <div class="container clearfix">
                <?php 
                $show_sub_hd_abt_pg = $page_meta['show_sub_hd_abt_pg'][0];
                $show_content_abt_pg = $page_meta['show_content_abt_pg'][0];  
                    $pages = get_pages(array(
                        'meta_key' => '_wp_page_template',
                        'meta_value' => 'page-about.php'
                    ));
                    foreach ($pages as $page) {
                        $abt_pg_id = $page->ID;
                    }
                    //echo $abt_pg_id;
                    $abt_pg_meta = get_post_meta($abt_pg_id);
                    $heading_abt_pg = $abt_pg_meta['heading_abt_pg'][0];
                    $content_abt_pg = $abt_pg_meta['content_abt_pg'][0];
                if(str_word_count($content_abt_pg) > 47){
                           $content_abt_pg_c = substr($content_abt_pg, 0, 315).'...'; 
                            }
                if($show_sub_hd_abt_pg == 1){                    
                    ?>
   <?php if($heading_abt_pg !=''){  ?><h2 class="divcenter bottommargin font-body about_heading" style="max-width: 700px; font-size: 40px;"><?php echo $heading_abt_pg; ?></h2><?php } ?>
                <?php }?>
                <?php if($content_abt_pg !=''){ ?>
   <p class="lead divcenter bottommargin about_content" style="max-width: 800px;"><?php echo $content_abt_pg_c; ?></p>
                    <?php } ?>
                <?php if(str_word_count($content_abt_pg) > 47){ ?><p class="bottommargin" style="font-size: 16px;"><a href="<?php echo get_permalink($abt_pg_id); ?>"  class="more-link">Read More <i class="fa fa-chevron-right"></i></a></p><?php } ?>
                <div class="clear"></div>
                <?php 
                $sl_team_member = $page_meta['sl_team_member'][0];
                if($sl_team_member > 0){
                ?>
                <div class="row topmargin-lg divcenter" style="max-width: 1000px;">
                    <?php 
                    for($i=0; $i< $sl_team_member; $i++){
                    $member_post_id =  $page_meta['sl_team_member_'.$i.'_member'][0];
                    $team_member_meta = get_post_meta($member_post_id);
                    $page = get_post($member_post_id);
                    $team_member_name = $page->post_title;                    
                    $member_photo_id = $team_member_meta['member_photo'][0];
                    $member_photo_src = wp_get_attachment_image_src($member_photo_id, 'full');
                    $member_designation = $team_member_meta['member_designation'][0];
                    $about_member_team = $team_member_meta['about_member_team'][0];                    
                    $facebook_link_team = $team_member_meta['facebook_link_team'][0];
                    $twitter_link_team = $team_member_meta['twitter_link_team'][0];
                    $google_plus_link_team = $team_member_meta['google_plus_link_team'][0];
                    $skype_link_team = $team_member_meta['skype_link_team'][0];
                    $linkedin_link_team = $team_member_meta['linkedin_link_team'][0];
                    $github_link_team = $team_member_meta['github_link_team'][0];
                    $flickr_link_team = $team_member_meta['flickr_link_team'][0];
                    $instagram_link_team = $team_member_meta['instagram_link_team'][0];
                    $vimeo_link_team = $team_member_meta['vimeo_link_team'][0];
                    ?>
                    <div class="col-sm-4 bottommargin">
                        <div class="team">
                            <div class="team-image">
                                <?php if($member_photo_src !=''){ ?>
        <img src="<?php echo bfiThumb_src($member_photo_src[0], 303, 371); ?>" alt="<?php echo $team_member_name; ?>">
                                <?php } else { ?>
        <img src="<?php bloginfo('template_directory'); ?>/images/noimage.jpg" alt="<?php echo $team_member_name; ?>">
                                <?php } ?>
                                <div class="team-overlay">
                                    <div class="team-social-icons">
                                        <?php if($facebook_link_team !=''){  ?>
    <a href="<?php echo $facebook_link_team; ?>" class="social-icon si-borderless si-small si-facebook" title="Facebook" target="_blank">
                                            <i class="fa fa-facebook"></i>
                                            <i class="fa fa-facebook"></i>
                                        </a><?php } ?><?php if($twitter_link_team !=''){  ?>
    <a href="<?php echo $twitter_link_team; ?>" class="social-icon si-borderless si-small si-twitter" title="Twitter" target="_blank">
                                            <i class="fa fa-twitter"></i>
                                            <i class="fa fa-twitter"></i>
                                        </a><?php }  ?><?php if($github_link_team !=''){  ?>
                                        <a href="<?php echo $github_link_team; ?>" class="social-icon si-borderless si-small si-github" title="Github" target="_blank">
                                            <i class="fa fa-git"></i>
                                            <i class="fa fa-git"></i>
                                        </a><?php }  ?><?php if($linkedin_link_team !=''){  ?>
                                        <a href="<?php echo $linkedin_link_team; ?>" class="social-icon si-borderless si-small si-linkedin" title="LinkedIn" target="_blank">
                                            <i class="fa fa-linkedin"></i>
                                            <i class="fa fa-linkedin"></i>
                                        </a><?php }  ?><?php if($flickr_link_team !=''){  ?>
                                        <a href="<?php echo $flickr_link_team; ?>" class="social-icon si-borderless si-small si-flickr" title="Flickr" target="_blank">
                                            <i class="fa fa-flickr"></i>
                                            <i class="fa fa-flickr"></i>
                                        </a><?php }  ?><?php if($vimeo_link_team !=''){  ?>
                                        <a href="<?php echo $vimeo_link_team; ?>" class="social-icon si-borderless si-small si-vimeo" title="Vimeo" target="_blank">
                                            <i class="fa fa-vimeo"></i>
                                            <i class="fa fa-vimeo"></i>
                                        </a><?php }  ?><?php if($instagram_link_team !=''){  ?>
                                        <a href="<?php echo $instagram_link_team; ?>" class="social-icon si-borderless si-small si-instagram" title="Instagram" target="_blank">
                                            <i class="fa fa-instagram"></i>
                                            <i class="fa fa-instagram"></i>
                                        </a><?php }  ?><?php if($google_plus_link_team !=''){  ?>
                                        <a href="<?php echo $google_plus_link_team; ?>" class="social-icon si-borderless si-small si-google" title="Google Plus" target="_blank">
                                            <i class="fa fa-google-plus"></i>
                                            <i class="fa fa-google-plus"></i>
                                        </a><?php }  ?><?php if($skype_link_team !=''){  ?>
                                        <a href="<?php echo $skype_link_team; ?>" class="social-icon si-borderless si-small si-skype" title="Skype" target="_blank">
                                            <i class="fa fa-skype"></i>
                                            <i class="fa fa-skype"></i>
                                        </a><?php }  ?>
                                    </div>
                                </div>
                            </div>
                            <div class="team-desc team-desc-bg">
                                <div class="team-title"><h4><?php echo $team_member_name; ?></h4>
                <?php if($member_designation !=''){ echo '<span>'.$member_designation.'</span>'; } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>                    
                </div>
                <?php } ?>
            </div>
        </div>
        <div id="section-works" class="page-section notoppadding">
            <?php $our_work_article_hm = $page_meta['our_work_article_hm'][0];
            if($our_work_article_hm !=''){ ?>
            <div class="section nomargin">
                <div class="container clearfix">
                    <div class="divcenter center" style="max-width: 900px;">
                        <h2 class="nobottommargin t300 ls1"><?php echo $our_work_article_hm; ?></h2>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php  $select_work_hm = $page_meta['select_work_hm'][0];
            if($select_work_hm > 0){  ?>
            <!-- Portfolio Items -->
            <div id="portfolio" class="portfolio-nomargin portfolio-full portfolio-masonry mixed-masonry clearfix" style="position: relative; height: 760px;">
            <?php
            for($counter=0; $counter < $select_work_hm; $counter++ ){                
                 $work_post_id =  $page_meta['select_work_hm_'.$counter.'_work_hm'][0];
                    $work_meta = get_post_meta($work_post_id);
                    $page = get_post($work_post_id);
                    $work_name = $page->post_title;                    
                    $member_photo_id = $work_meta['member_photo'][0];
                    $portfolio_meta = get_post_meta($post->ID);
                    $portfolio_image_id = $work_meta['portfolio_image'][0];                            
                    $portfolio_image_src = wp_get_attachment_image_src($portfolio_image_id, 'full');
                    $portfolio_sub_title = $work_meta['portfolio_sub_title'][0];
            ?>
             <?php if($counter == 0){ ?>
                <article class="portfolio-item pf-media pf-icons wide" style="position: absolute; left: 0px; top: 0px; width: 676px;">
                    <div class="portfolio-image">
                        <a href="">
                            <img src="<?php echo bfiThumb_src($portfolio_image_src[0], 676, 507); ?>" alt="<?php echo $work_name; ?>" style="visibility: visible; opacity: 1; display: block;">
                        </a>
                        <div class="portfolio-overlay">
                            <div class="portfolio-desc" style="margin-top: 226px;">
                                <h3><a href="<?php echo get_permalink($work_post_id); ?>"><?php echo $work_name; ?></a></h3>
                                <?php if($portfolio_sub_title !=''){ ?><span><a href="<?php echo get_permalink($work_post_id); ?>"><?php echo $portfolio_sub_title; ?></a></span><?php } ?>
                            </div>
                        </div>
                    </div>
                </article>
                <?php } elseif ($counter == 1){ ?>
                <article class="portfolio-item pf-illustrations" style="position: absolute; left: 676px; top: 0px; width: 338px;">
                    <div class="portfolio-image">
                        <a href="">
                            <img src="<?php echo bfiThumb_src($portfolio_image_src[0], 338, 254); ?>" alt="<?php echo $work_name; ?>" style="visibility: visible; opacity: 1; display: block;">
                        </a>
                        <div class="portfolio-overlay">
                            <div class="portfolio-desc" style="margin-top: 99px;">
                                <h3><a href="<?php echo get_permalink($work_post_id); ?>"><?php echo $work_name; ?></a></h3>
                                <?php if($portfolio_sub_title !=''){ ?><span><a href="<?php echo get_permalink($work_post_id); ?>"><?php echo $portfolio_sub_title; ?></a></span><?php } ?>
                            </div>
                        </div>
                    </div>
                </article>
                <?php } elseif ($counter == 2){ ?>
                <article class="portfolio-item pf-graphics pf-uielements" style="position: absolute; left: 1014px; top: 0px; width: 338px;">
                    <div class="portfolio-image">
                        <a href="">
                            <img src="<?php echo bfiThumb_src($portfolio_image_src[0], 338, 254); ?>" alt="<?php echo $work_name; ?>" style="visibility: visible; opacity: 1; display: block;">
                        </a>
                        <div class="portfolio-overlay">
                            <div class="portfolio-desc" style="margin-top: 99px;">
                                <h3><a href="<?php echo get_permalink($work_post_id); ?>"><?php echo $work_name; ?></a></h3>
                                <?php if($portfolio_sub_title !=''){ ?><span><a href="<?php echo get_permalink($work_post_id); ?>"><?php echo $portfolio_sub_title; ?></a></span><?php } ?>
                            </div>
                        </div>
                    </div>
                </article>
                <?php } elseif ($counter == 3){ ?>
                <article class="portfolio-item pf-media pf-icons wide" style="position: absolute; left: 676px; top: 253px; width: 676px;">
                    <div class="portfolio-image">
                        <a href="">
                            <img src="<?php echo bfiThumb_src($portfolio_image_src[0], 676, 254); ?>" alt="<?php echo $work_name; ?>" style="visibility: visible; opacity: 1; display: block;">
                        </a>
                        <div class="portfolio-overlay">
                            <div class="portfolio-desc" style="margin-top: 99px;">
                                <h3><a href="<?php echo get_permalink($work_post_id); ?>"><?php echo $work_name; ?></a></h3>
                                <?php if($portfolio_sub_title !=''){ ?><span><a href="<?php echo get_permalink($work_post_id); ?>"><?php echo $portfolio_sub_title; ?></a></span><?php } ?>
                            </div>
                        </div>
                    </div>
                </article>
                <?php } elseif ($counter == 4){ ?>
                <article class="portfolio-item pf-uielements pf-media wide" style="position: absolute; left: 676px; top: 506px; width: 676px;">
                    <div class="portfolio-image">
                        <a href="">
                            <img src="<?php echo bfiThumb_src($portfolio_image_src[0], 676, 254); ?>" alt="<?php echo $work_name; ?>" style="visibility: visible; opacity: 1; display: block;">
                        </a>
                        <div class="portfolio-overlay">
                            <div class="portfolio-desc" style="margin-top: 99px;">
                                <h3><a href="<?php echo get_permalink($work_post_id); ?>"><?php echo $work_name; ?></a></h3>
                                <?php if($portfolio_sub_title !=''){ ?><span><a href="<?php echo get_permalink($work_post_id); ?>"><?php echo $portfolio_sub_title; ?></a></span><?php } ?>
                            </div>
                        </div>
                    </div>
                </article>
                <?php } elseif ($counter == 5){ ?>
                <article class="portfolio-item pf-media pf-icons" style="position: absolute; left: 0px; top: 507px; width: 338px;">
                    <div class="portfolio-image">
                        <a href="">
                            <img src="<?php echo bfiThumb_src($portfolio_image_src[0], 338, 254); ?>" alt="<?php echo $work_name; ?>" style="visibility: visible; opacity: 1; display: block;">
                        </a>
                        <div class="portfolio-overlay">
                            <div class="portfolio-desc" style="margin-top: 99px;">
                                <h3><a href="<?php echo get_permalink($work_post_id); ?>"><?php echo $work_name; ?></a></h3>
                                <?php if($portfolio_sub_title !=''){ ?><span><a href="<?php echo get_permalink($work_post_id); ?>"><?php echo $portfolio_sub_title; ?></a></span><?php } ?>
                            </div>
                        </div>
                    </div>
                </article>
                <?php } elseif ($counter == 6){ ?>
                <article class="portfolio-item pf-uielements pf-icons" style="position: absolute; left: 338px; top: 507px; width: 338px;">
                    <div class="portfolio-image">
                        <a href="">
                            <img src="<?php echo bfiThumb_src($portfolio_image_src[0], 338, 254); ?>" alt="<?php echo $work_name; ?>" style="visibility: visible; opacity: 1; display: block;">
                        </a>
                        <div class="portfolio-overlay">
                            <div class="portfolio-desc" style="margin-top: 99px;">
                                <h3><a href="<?php echo get_permalink($work_post_id); ?>"><?php echo $work_name; ?></a></h3>
                                <?php if($portfolio_sub_title !=''){ ?><span><a href="<?php echo get_permalink($work_post_id); ?>"><?php echo $portfolio_sub_title; ?></a></span><?php } ?>
                            </div>
                        </div>
                    </div>
                </article>
                <?php }  } ?>           
            </div><!-- #portfolio end -->
            <?php } ?>
            <?php 
            $view_more_btn_txt_work_hm = $page_meta['view_more_btn_txt_work_hm'][0];
            $view_more_btn_link_work_hm = $page_meta['view_more_btn_link_work_hm'][0];
            if($view_more_btn_txt_work_hm !=''){
            ?>
            <div class="topmargin center"><a href="<?php echo get_permalink($view_more_btn_link_work_hm); ?>" class="button button-border button-circle t600"><?php echo $view_more_btn_txt_work_hm; ?></a></div>
            <?php } ?>
        </div>
        <div id="section-services" class="page-section notoppadding">
            <?php 
            $service_article_hm = $page_meta['service_article_hm'][0];
            if($service_article_hm !=''){
            ?>
            <div class="section nomargin">
                <div class="container clearfix">
                    <div class="divcenter center" style="max-width: 900px;">
                        <h2 class="nobottommargin t300 ls1"><?php echo $service_article_hm; ?></h2>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="common-height clearfix">
                <?php $featured_img_ser_hm_id = $page_meta['featured_img_ser_hm'][0];
$featured_img_ser_hm_src = wp_get_attachment_image_src($featured_img_ser_hm_id, 'full'); ?>
                <div class="col-md-4 hidden-xs" style="height: 516px; 
                     background: url(<?php echo $featured_img_ser_hm_src[0]; ?>) 50% 50% no-repeat; background-size:cover;"></div>
                 <?php $services_hm_pg = $page_meta['services_hm_pg'][0]; 
        if($services_hm_pg > 0){ ?>    
                <div class="col-md-8" style="height: 516px;">
                    <div class="max-height">
                        <div class="row common-height grid-border clearfix">
                            <?php for($i=0; $i<$services_hm_pg; $i++){ 
                                       $service_icon_hm = $page_meta['services_hm_pg_'.$i.'_service_icon_hm'][0];
                                       $service_title_hm = $page_meta['services_hm_pg_'.$i.'_service_title_hm'][0];
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
        <?php } ?>
            </div>
            <div class="section dark nomargin">
                <div class="divcenter center" style="max-width: 900px;">
                    <?php 
                    $content_cta_hm = $page_meta['content_cta_hm'][0];
                    $btn_txt_cta_hm = $page_meta['btn_txt_cta_hm'][0];
                    $btn_link_cta_hm = $page_meta['btn_link_cta_hm'][0];                            
                    ?>
                    <h2 class="nobottommargin t300 ls1"><?php echo $content_cta_hm; ?> <?php if($btn_txt_cta_hm !=''){ ?><a href="<?php echo $btn_link_cta_hm; ?>" <?php if($btn_link_cta_hm ==''){ ?>data-scrollto="#template-contactform" data-offset="140" data-easing="easeInOutExpo" data-speed="1250"<?php } ?> class="button button-border button-circle button-light button-large notopmargin nobottommargin" style="position: relative; top: -3px;"><?php echo $btn_txt_cta_hm; ?></a><?php } ?></h2>
                </div>
            </div>
            <?php $bg_img_testimonals_hm_id = $page_meta['bg_img_testimonals_hm'][0];
         $bg_img_testimonals_hm_src = wp_get_attachment_image_src($bg_img_testimonals_hm_id, 'full'); ?>
            <div class="section parallax nomargin dark" style="padding: 150px 0px; 
                 background-image:url(<?php echo $bg_img_testimonals_hm_src[0]; ?>); 
                 background-color:#566573;
                 background-attachment: fixed; background-repeat: no-repeat;
                 background-position: center;  background-size: cover;" 
                 data-stellar-background-ratio="0.3">
                <?php $select_testimonial_hm = $page_meta['select_testimonial_hm'][0];
                if($select_testimonial_hm > 0){ ?>
                <div class="container clearfix">
                    <div class="col_two_fifth nobottommargin">&nbsp;</div>
                    <div class="col_three_fifth nobottommargin col_last">
                        <div class="fslider testimonial testimonial-full nobgcolor noborder noshadow nopadding" data-arrows="false">
                            <div class="flexslider">
                                <div class="flex-viewport" style="overflow: hidden; position: relative;"><div class="slider-wrap" style="width: 1000%; transition-duration: 0s; transform: translate3d(-666px, 0px, 0px);">
                                        <?php 
                                        for($j=0; $j < $select_testimonial_hm; $j++){
                        $sl_testi_id = $page_meta['select_testimonial_hm_'.$j.'_testimonial'][0];    
                                            $testi_meta = get_post_meta($sl_testi_id);
                                        $designation = $testi_meta['designation'][0];
                                         $testi_title = get_the_title( $sl_testi_id );
                                           $content_post = get_post($sl_testi_id);
                                           $testi_content = $content_post->post_content;
                                        ?>
                                        <div class="slide clone testi-slide-sec" aria-hidden="true">
                                            <div class="testi-content">
                                <?php if($testi_content !=''){ echo '<p>'.$testi_content.'</p>'; } ?>
                                                <div class="testi-meta">
                                    <?php echo $testi_title .'<br> '; 
                                    if($designation !=''){ echo '<span>'.$designation .'</span>'; } ?>
                                                </div>
                                            </div>
                                        </div>
                <?php } ?>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>        
        <div id="section-blog" class="page-section">
            <?php $title_blog_hm = $page_meta['title_blog_hm'][0];
            if($title_blog_hm !=''){ ?>
            <h2 class="center uppercase t300 ls3 font-body"><?php echo $title_blog_hm; ?></h2><?php } ?>
            <?php $select_post_hm = $page_meta['select_post_hm'][0];
                   if($select_post_hm !=''){ ?>
            <div class="section nobottommargin">
                <div class="container clearfix">
                    <div class="row topmargin clearfix">
                        <?php 
                        for($k=0; $k < $select_post_hm; $k++){
                           $post_hm_id = $page_meta['select_post_hm_'.$k.'_post_hm'][0];
                        $post_title = get_the_title( $post_hm_id );
                        $content_post = get_post($post_hm_id);
                        $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post_hm_id) );
                        $content_post = $content_post->post_content;
                            if(str_word_count($content_post) > 47){
                           $content_post = substr($content_post, 0, 150).'...'; 
                            }
                        ?>
                        <div class="ipost col-sm-6 bottommargin clearfix">
                            <div class="row">
                                        <div class="col-md-6">
                                            <div class="entry-image nobottommargin">
<a href="<?php echo get_permalink($post_hm_id); ?>">
    <img src="<?php echo bfiThumb_src($feat_image, 263, 197); ?>" alt="<?php echo $post_title; ?>" ></a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="entry-title">
<h3 class="t400" style="font-size: 22px;">
    <a href="<?php echo get_permalink($post_hm_id); ?>"><?php echo $post_title; ?></a></h3>
                                            </div>
        <span class="before-heading" style="font-style: normal;"><?php echo $content_post; ?></span>
                                            <div class="entry-content">
        <a href="<?php echo get_permalink($post_hm_id); ?>" class="more-link">Read More <i class="fa fa-chevron-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                        </div><?php } ?>                    
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php $client_logos_hm = $page_meta['client_logos_hm'][0];
            if($client_logos_hm > 0){ ?>
            <div class="container topmargin-lg clearfix">
                <div id="oc-clients" class="owl-carousel topmargin image-carousel">
                    <?php for($i=0; $i<$client_logos_hm; $i++){ 
                 $logo_cl_id = $page_meta['client_logos_hm_'.$i.'_logo_cl'][0];
                 $logo_cl_src = wp_get_attachment_image_src($logo_cl_id, 'full');
                 $cl_name = $page_meta['client_logos_hm_'.$i.'_cl_name'][0];
                 $link_cl = $page_meta['client_logos_hm_'.$i.'_link_cl'][0];
                 if($logo_cl_src !=''){ ?>
<div class="oc-item"><a href="<?php echo $link_cl; ?>"><img src="<?php echo $logo_cl_src[0]; ?>" alt="<?php echo $cl_name; ?>" width="400" ></a></div>
                    <?php } } ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <div id="section-contact" class="page-section notoppadding">
            <?php $show_map_with_contact_info = $page_meta['show_map_with_contact_info'][0];
            if($show_map_with_contact_info == 1){
                 $pages = get_pages(array(
                        'meta_key' => '_wp_page_template',
                        'meta_value' => 'page-contact.php'
                    ));
                    foreach ($pages as $page) {
                        $con_pg_id = $page->ID;
                    }
                    //echo $abt_pg_id;
                    $con_pg_meta = get_post_meta($con_pg_id);
            ?>
            <div class="row noleftmargin norightmargin bottommargin-lg common-height">
                <div class="col-md-8 col-sm-6" style="padding:0px;"> 
                    <div id="googlemaps" class="google-map" style="height : 509px; width: 100%"></div>                    
                </div>
                <div class="col-md-4 col-sm-6 contact_info" >
                    <div class="col-padding max-height">
                        <?php 
                        $heading_contact_info = $con_pg_meta['heading_contact_info'][0];
                        $address_1_contact_info = $con_pg_meta['address_1_contact_info'][0];
                        $address_2_contact_info = $con_pg_meta['address_2_contact_info'][0];
                        $phone_no_contact_info = $con_pg_meta['phone_number_contact_info'][0];
                        $fax_contact_info = $con_pg_meta['fax_contact_info'][0];
                        $email_addr_contact_info = $con_pg_meta['email_address_contact_info'][0];
                        ?>
                        <?php if($heading_contact_info !=''){ ?>
                        <h3 class="font-body t400 ls1"><?php echo $heading_contact_info; ?></h3>
                        <?php } ?>
                        <div style="font-size: 16px; line-height: 1.7;">
           <?php if($address_1_contact_info !=''){  echo '<address>'.$address_1_contact_info.'</address>';  } ?>
                            <div class="clear topmargin-sm"></div>
           <?php if($address_2_contact_info !=''){  echo '<address>'.$address_2_contact_info.'</address>';  } ?>
                            <div class="clear topmargin"></div>
                            <?php if($phone_no_contact_info !=''){ ?>
     <abbr title="Phone Number"><strong>Phone:</strong></abbr><?php echo $phone_no_contact_info; ?><br>
                            <?php } ?>
                 <?php if($fax_contact_info !=''){ ?>
                            <abbr title="Fax"><strong>Fax:</strong></abbr><?php echo $fax_contact_info; ?><br>
                            <?php } ?>
                            <?php if($email_addr_contact_info !=''){ ?>
                 <abbr title="Email Address"><strong>Email:</strong></abbr><?php echo $email_addr_contact_info; ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php $contact_us_form_shortcode_hm = $page_meta['contact_us_form_shortcode_hm'][0];
            if($contact_us_form_shortcode_hm !=''){ ?>
            <div class="container clearfix">
                <div class="divcenter topmargin" style="max-width: 850px;">                    
                    <?php                   
//   $form_shortcode = '[contact-form-7 id="4" title="Contact form" html_id="template-contactform"]';
                       echo do_shortcode($contact_us_form_shortcode_hm);                   
                    ?>  
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section><!-- #content end -->
<?php
get_footer();
?>
<?php 
if($show_map_with_contact_info == 1){
$map_address = 'map_address';
$heading_1_on_map_marker = $con_pg_meta['heading_1_on_map_marker'][0];
$heading_2_on_map_marker = $con_pg_meta['heading_2_on_map_marker'][0];
$latitude = $con_pg_meta['latitude'][0];
$longitude = $con_pg_meta['longitude'][0];
?>
<script type="text/javascript">
    jQuery(function($) {
    // Asynchronously Load the map API 
    var script = document.createElement('script');
    script.src = "//maps.googleapis.com/maps/api/js?key=AIzaSyDzxpHtzOZgrxfCEaTiOw6Xf11jYoX_C3k&callback=initialize";
    document.body.appendChild(script);
});
function initialize() {
    var map;
    // Set the latitude & longitude for our location (London Eye)
    var myLatlng = new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>);
    var mapOptions = {
        center: myLatlng, // Set our point as the centre location
        zoom: 16, // Set the zoom level
        mapTypeId: 'roadmap', // set the default map type
        scrollwheel: false
    };            
    // Display a map on the page
    map = new google.maps.Map(document.getElementById("googlemaps"), mapOptions);
    // Allow our satellite view have a tilted display (This only works for certain locations) 
    map.setTilt(45);
    // Create our info window content   
    var infoWindowContent = '<div class="info_content">' +
        '<h3><?php echo $heading_1_on_map_marker; ?></h3>' +
        '<p><?php echo $heading_2_on_map_marker; ?></p>' +
    '</div>';
    // Initialise the inforWindow
    var infoWindow = new google.maps.InfoWindow({
        content: infoWindowContent
    });                
    // Add a marker to the map based on our coordinates
    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        icon : '<?php bloginfo('template_directory'); ?>/images/pin.png',
        title: '<?php echo $heading_1_on_map_marker; ?>'
    });
    // Display our info window when the marker is clicked
    google.maps.event.addListener(marker, 'click', function() {
        infoWindow.open(map, marker);
    });
   infoWindow.open(map, marker);
 }
    </script>
<?php } ?>