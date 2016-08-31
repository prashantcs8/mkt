<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
        <?php
        wp_head();
        do_action('site_customjs');
        ?>
<!--        <style type="text/css">.gm-style .gm-style-cc span,.gm-style .gm-style-cc a,.gm-style .gm-style-mtc div{font-size:10px}</style>
        <style type="text/css">@media print {  .gm-style .gmnoprint, .gmnoprint {    display:none  }}@media screen {  .gm-style .gmnoscreen, .gmnoscreen {    display:none  }}
        </style>
        <style type="text/css">.gm-style{font-family:Roboto,Arial,sans-serif;font-size:11px;font-weight:400;text-decoration:none}.gm-style img{max-width:none}
        </style>-->
        <meta name="author" content="">
        <meta name="description" content="">
        <?php
        $favicon_id = get_option('options_favicon');
        $favicon_src = wp_get_attachment_image_src($favicon_id, 'full');
        ?>
        <link rel="shortcut icon" href="<?php echo $favicon_src[0]; ?>">
        <link href="<?php echo $favicon_src[0]; ?>" rel="shortcut icon" type="image/x-icon">
        <link href="<?php echo $favicon_src[0]; ?>" rel="icon" type="image/x-icon">
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/font/lte-ie7.js" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--[if lt IE 9]>
                <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->       
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>

        <title> <?php
            global $page, $paged;
            wp_title('|', true, 'right');
            bloginfo('name');
            $site_description = get_bloginfo('description', 'display');
            if ($site_description && ( is_home() || is_front_page() ))
                echo " | $site_description";
            ?></title>

        <style id="fit-vids-style">.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}</style>
    </head>
    <body <?php body_class("stretched device-lg"); ?> class="stretched device-lg" data-loader="11" data-loader-color="#543456">
        <!-- Document Wrapper -->
        <div id="wrapper" class="clearfix" >
            <!-- Header-->
            <header id="header" class="full-header transparent-header border-full-header dark static-sticky" data-sticky-class="not-dark" data-sticky-offset="full" data-sticky-offset-negative="100">
                <div id="header-wrap" class="">
                    <div class="container clearfix">
                        <div id="primary-menu-trigger"><i class="fa fa-bars"></i></div>
                        <!-- Logo-->
                        <div id="logo">
                            <?php 
                            $main_logo_id = get_option('options_main_logo');
                            $main_logo_src = wp_get_attachment_image_src($main_logo_id, 'full');
                            ?>
                            <a href="<?php echo site_url(); ?>" class="standard-logo">
                                <img src="<?php echo $main_logo_src[0]; ?>" alt="Logo"></a>
    <a href="<?php echo site_url(); ?>" class="retina-logo"><img src="<?php echo $main_logo_src[0]; ?>" alt="Logo"></a>
                        </div><!-- #logo end -->
                        <!-- Primary Navigation-->
                        <nav id="primary-menu">
                            <?php
                            if (has_nav_menu('primary')) {
                                $defaults = array(
                                    'theme_location' => 'primary',
                                    'menu' => 'main_menu',
                                    'container' => '',
                                    'container_class' => '',
                                    'container_id' => '',
                                    'menu_class' => 'menu',
                                    'echo' => true,
                                    'items_wrap' => '<ul id="%1$s mainMenu" class="%2$s one-page-menu sf-js-enabled" data-easing="easeInOutExpo" data-speed="1250" data-offset="65" >%3$s</ul>',
                                );
                                wp_nav_menu($defaults);
                            }
                            ?>
                        </nav><!-- #primary-menu end -->
                    </div>
                </div>
            </header><!-- #header end -->