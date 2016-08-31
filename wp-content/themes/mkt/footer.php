<!-- Footer -->
<footer id="footer" class="dark noborder">
    <div class="container center">
        <div class="footer-widgets-wrap">
            <div class="row divcenter clearfix">
                <div class="col-md-4">
                    <div class="widget clearfix">
                        <?php 
                        $menu_title = get_option('options_menu_title'); 
                        if($menu_title !=''){ echo '<h4>'.$menu_title.'</h4>'; } ?>
                        
                        <ul class="list-unstyled footer-site-links nobottommargin">
                            <?php 
                            $footer_menu_links = get_option('options_footer_menu_links');
                            for($i=0;$i<$footer_menu_links; $i++){
                                $navigation_label = get_option('options_footer_menu_links_'.$i.'_navigation_label');
                                $linked_to = get_option('options_footer_menu_links_'.$i.'_linked_to');
                            ?>
                <li><a href="<?php echo get_permalink($linked_to); ?>" ><?php echo $navigation_label; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget clearfix">
                        <?php 
                        $subscribe_form_title = get_option('options_subscribe_form_title'); 
                        if($subscribe_form_title !=''){ echo '<h4>'.$subscribe_form_title.'</h4>'; } ?>
                        <div id="widget-subscribe-form-result" data-notify-type="success" data-notify-msg=""></div>
                        <?php 
                    $form_shortcode = get_option('options_subscribe_form_shortcode_footer');
//                    $form_shortcode = '[contact-form-7 id="39" title="Subscribe Form" html_id="register_form" html_class="contact-form"]';
                                          if($form_shortcode !=''){   echo do_shortcode($form_shortcode); }                   
                    ?> 
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget clearfix">
                        <?php 
                        $contact_sec_title_footer = get_option('options_contact_sec_title_footer'); 
                        $address_footer = get_option('options_address_footer');                        
                        if($contact_sec_title_footer !=''){ echo '<h4>'.$contact_sec_title_footer.'</h4>'; } 
                        if($address_footer !=''){ echo '<p class="lead">'.$address_footer.'</p>'; }
                        $facebook_link_footer = get_option('options_facebook_link_footer');  
                        $twitter_link_footer = get_option('options_twitter_link_footer');  
                        $github_link_footer = get_option('options_github_link_footer');  
                        $pinterest_link_footer = get_option('options_pinterest_link_footer');  
                        
                        ?>
                        <div class="center topmargin-sm">
                            <?php if($facebook_link_footer !=''){ ?>
                            <a href="<?php echo $facebook_link_footer; ?>" class="social-icon inline-block noborder si-small si-facebook" title="Facebook"  target="_blank">
                                <i class="fa fa-facebook"></i>
                                <i class="fa fa-facebook"></i>
                            </a>
                            <?php } ?>
                            <?php if($twitter_link_footer !=''){ ?>
                            <a href="<?php echo $twitter_link_footer; ?>" class="social-icon inline-block noborder si-small si-twitter" title="Twitter"  target="_blank">
                                <i class="fa fa-twitter"></i>
                                <i class="fa fa-twitter"></i>
                            </a>
                            <?php } ?>
                            <?php if($github_link_footer !=''){ ?>
                            <a href="<?php echo $github_link_footer; ?>" class="social-icon inline-block noborder si-small si-github" title="Github"  target="_blank">
                                <i class="fa fa-git"></i>
                                <i class="fa fa-git"></i>
                            </a>
                            <?php } ?>
                            <?php if($pinterest_link_footer !=''){ ?>
                            <a href="<?php echo $pinterest_link_footer; ?>" class="social-icon inline-block noborder si-small si-pinterest" title="Pinterest"  target="_blank">
                                <i class="fa fa-pinterest-p"></i>
                                <i class="fa fa-pinterest-p"></i>
                            </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="copyrights">
        <div class="col-lg-12 footer-menu">
            <div class="col-xs-12 col-sm-6">
                <div class="footer-copyright">
                    <span>All rights reserved Copyright &copy; <?php echo date("Y") ?> </span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <?php
                    $footerdefaults = array(
                        'menu' => 'footer_menu',
                        'container' => '',
                        'container_class' => '',
                        'container_id' => '',
                        'menu_class' => 'menu',
                        'echo' => true,
                        'items_wrap' => '<ul id="%1$s mainMenu" class="%2$s footer-privacy">%3$s</ul>',
                    );
                    wp_nav_menu($footerdefaults);
                    ?> 
            </div>
        </div>
    </div>
</footer><!-- #footer end -->
</div><!-- #wrapper end -->
<!-- Go To Top -->
<div id="gotoTop" class="fa fa-angle-up" style="display: none;"></div>
<!-- Footer Scripts -->
<?php wp_footer(); ?>
<script type="text/javascript">
//    jQuery("#template-contactform").validate({
//        submitHandler: function (form) {
//            jQuery('.form-process').fadeIn();
//            jQuery(form).ajaxSubmit({
//                target: '#contact-form-result',
//                success: function () {
//                    jQuery('.form-process').fadeOut();
//                    jQuery(form).find('.sm-form-control').val('');
//                    jQuery('#contact-form-result').attr('data-notify-msg', jQuery('#contact-form-result').html()).html('');
//                    SEMICOLON.widget.notifications(jQuery('#contact-form-result'));
//                }
//            });
//        }
//    });
</script>
<!-- Portfolio Script -->
<script type="text/javascript">
    jQuery(window).load(function () {
        var jQuerycontainer = jQuery('#portfolio');
        jQuerycontainer.isotope({
            transitionDuration: '0.65s',
            masonry: {
                columnWidth: jQuerycontainer.find('.portfolio-item:not(.wide)')[0]
            }
        });
        jQuery(window).resize(function () {
            jQuerycontainer.isotope('layout');
            SEMICOLON.portfolio.portfolioDescMargin();
        });
        var t = setTimeout(function () {
            SEMICOLON.portfolio.portfolioDescMargin();
        }, 200);
    });
</script><!-- Portfolio Script End -->
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        var ocClients = $("#oc-clients");
        ocClients.owlCarousel({
            margin: 80,
            loop: true,
            nav: false,
            autoplay: true,
            dots: false,
            autoplayHoverPause: true,
            responsive: {
                0: {items: 2},
                480: {items: 3},
                768: {items: 4},
                992: {items: 5},
                1200: {items: 6}
            }
        });
    });
</script>
</body></html>