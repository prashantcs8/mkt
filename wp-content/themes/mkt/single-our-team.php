<?php get_header(); ?>
<div class="content_wrapper">
    <?php if (have_posts()) {
        the_post(); ?>
        <div class="row text-center">
            <div class="col-md-12">
                <div class="section-top area-testimonial">
                    <h2><?php the_title(); ?></h2>
                </div>
            </div>
        </div>
        <div class="page_content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 main_content">
                        <?php
                    $team_member_meta = get_post_meta($post->ID);                     
                    $member_photo_id = $team_member_meta['member_photo'][0];
                    $member_photo_src = wp_get_attachment_image_src($member_photo_id, 'full');
                    $member_designation = $team_member_meta['member_designation'][0];
                    $about_member = $team_member_meta['about_member_team'][0];
                    
                    $facebook_link = $team_member_meta['facebook_link_team'][0];
                    $twitter_link = $team_member_meta['twitter_link_team'][0];
                    $google_plus_link = $team_member_meta['google_plus_link_team'][0];
                    $skype_link = $team_member_meta['skype_link_team'][0];
                    $linkedin_link = $team_member_meta['linkedin_link_team'][0];
                    $github_link = $team_member_meta['github_link_team'][0];
                    $flickr_link = $team_member_meta['flickr_link_team'][0];
                    $instagram_link = $team_member_meta['instagram_link_team'][0];
                    $vimeo_link = $team_member_meta['vimeo_link_team'][0]; 
                        ?>
                        <div class="col-md-6 col-md-offset-3 ">
                            <div class="first-team content blog_post_content" style="text-align: center; margin-top: 10px;" >
                                <img src="<?php echo bfiThumb_src($member_photo_src[0], 303, 371); ?>" alt="<?php echo the_title(); ?>">
                                <h4><?php echo the_title(); ?></h4>
                                <?php if($member_designation !=''){ echo '<h5>'.$member_designation.'</h5>'; } ?>
                                <p><?php echo $about_member; ?></p>
                                <div class="team-member-social-icons">
                                        <?php if($facebook_link !=''){  ?>
    <a href="<?php echo $facebook_link; ?>" class="social-icon si-borderless si-small si-facebook" title="Facebook" target="_blank">
                                            <i class="fa fa-facebook"></i>
                                            <i class="fa fa-facebook"></i>
                                        </a><?php } ?><?php if($twitter_link !=''){  ?>
    <a href="<?php echo $twitter_link; ?>" class="social-icon si-borderless si-small si-twitter" title="Twitter" target="_blank">
                                            <i class="fa fa-twitter"></i>
                                            <i class="fa fa-twitter"></i>
                                        </a><?php }  ?><?php if($github_link !=''){  ?>
                                        <a href="<?php echo $github_link; ?>" class="social-icon si-borderless si-small si-github" title="Github" target="_blank">
                                            <i class="fa fa-git"></i>
                                            <i class="fa fa-git"></i>
                                        </a><?php }  ?><?php if($linkedin_link !=''){  ?>
                                        <a href="<?php echo $linkedin_link; ?>" class="social-icon si-borderless si-small si-linkedin" title="LinkedIn" target="_blank">
                                            <i class="fa fa-linkedin"></i>
                                            <i class="fa fa-linkedin"></i>
                                        </a><?php }  ?><?php if($flickr_link !=''){  ?>
                                        <a href="<?php echo $flickr_link; ?>" class="social-icon si-borderless si-small si-flickr" title="Flickr" target="_blank">
                                            <i class="fa fa-flickr"></i>
                                            <i class="fa fa-flickr"></i>
                                        </a><?php }  ?><?php if($vimeo_link !=''){  ?>
                                        <a href="<?php echo $vimeo_link; ?>" class="social-icon si-borderless si-small si-vimeo" title="Vimeo" target="_blank">
                                            <i class="fa fa-vimeo"></i>
                                            <i class="fa fa-vimeo"></i>
                                        </a><?php }  ?><?php if($instagram_link !=''){  ?>
                                        <a href="<?php echo $instagram_link; ?>" class="social-icon si-borderless si-small si-instagram" title="Instagram" target="_blank">
                                            <i class="fa fa-instagram"></i>
                                            <i class="fa fa-instagram"></i>
                                        </a><?php }  ?><?php if($google_plus_link !=''){  ?>
                                        <a href="<?php echo $google_plus_link; ?>" class="social-icon si-borderless si-small si-google" title="Google Plus" target="_blank">
                                            <i class="fa fa-google-plus"></i>
                                            <i class="fa fa-google-plus"></i>
                                        </a><?php }  ?><?php if($skype_link !=''){  ?>
                                        <a href="<?php echo $skype_link; ?>" class="social-icon si-borderless si-small si-skype" title="Skype" target="_blank">
                                            <i class="fa fa-skype"></i>
                                            <i class="fa fa-skype"></i>
                                        </a><?php }  ?>
                                    </div>
                            </div>
                            <div class="post_navigation">
                                <div class="pull-left">
                                    <?php previous_post_link('%link', '&laquo; ' . __('Previous Team Member')) ?>
                                </div>
                                <div class="pull-right">
                                    <?php next_post_link('%link', __('Next Team Member') . ' &raquo;') ?>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>	
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php get_footer(); ?>