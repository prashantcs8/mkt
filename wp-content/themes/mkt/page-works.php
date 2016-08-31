<?php
/*
 * Template Name: Our Work Page
 */
get_header();
$page_meta = get_post_meta($post->ID);
//pr($page_meta);
?>
<style type="text/css">
    .navigation.sweetwords{
    top: 100% !important;
    bottom: 0;
    left: 50% !important;  
    }
</style>
 <?php if (have_posts()) : the_post(); ?>
<div class="col-md-12">
    <div class="section-top">
        <h2><?php the_title(); ?></h2>
    </div>
</div>
<?php endif; ?>
<div class="clearfix"></div>
<section id="content" style="margin-bottom: 0px;">
    <div class="content-wrap nopadding">
        <div id="section-works" class="page-section notoppadding">
            <div class="section nomargin">
                <div class="container clearfix">
                    <div class="divcenter center" style="max-width: 900px;">
                        <h2 class="nobottommargin t300 ls1">
                            <?php the_content(); ?></h2>
                    </div>
                </div>
            </div>
            <!-- Portfolio Items -->
            <div id="portfolio" class="portfolio-nomargin portfolio-full portfolio-masonry mixed-masonry clearfix" style="position: relative; height: 760px;">
                <?php
                    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                    $wp_query = new WP_Query('post_type=portfolio&posts_per_page=7&paged=' . $paged);
                    if ($wp_query->have_posts()) {
                        $count = 0;
                        while ($wp_query->have_posts()) {
                            $wp_query->the_post();
                            $title = get_the_title();
                            $portfolio_meta = get_post_meta($post->ID);
                            $portfolio_image_id = $portfolio_meta['portfolio_image'][0];                            
                            $portfolio_image_src = wp_get_attachment_image_src($portfolio_image_id, 'full');
                            $portfolio_sub_title = $portfolio_meta['portfolio_sub_title'][0];
                            ?>
                <?php if($count == 0){ ?>
                <article class="portfolio-item pf-media pf-icons wide" style="position: absolute; left: 0px; top: 0px; width: 676px;">
                    <div class="portfolio-image">
                        <a href="">
                            <img src="<?php echo bfiThumb_src($portfolio_image_src[0], 676, 507); ?>" alt="<?php echo $title; ?>" style="visibility: visible; opacity: 1; display: block;">
                        </a>
                        <div class="portfolio-overlay">
                            <div class="portfolio-desc" style="margin-top: 226px;">
                                <h3><a href="<?php the_permalink(); ?>"><?php echo $title; ?></a></h3>
                                <?php if($portfolio_sub_title !=''){ ?><span><a href="<?php the_permalink(); ?>"><?php echo $portfolio_sub_title; ?></a></span><?php } ?>
                            </div>
                        </div>
                    </div>
                </article>
                <?php } elseif ($count == 1){ ?>
                <article class="portfolio-item pf-illustrations" style="position: absolute; left: 676px; top: 0px; width: 338px;">
                    <div class="portfolio-image">
                        <a href="">
                            <img src="<?php echo bfiThumb_src($portfolio_image_src[0], 338, 254); ?>" alt="<?php echo $title; ?>" style="visibility: visible; opacity: 1; display: block;">
                        </a>
                        <div class="portfolio-overlay">
                            <div class="portfolio-desc" style="margin-top: 99px;">
                                <h3><a href="<?php the_permalink(); ?>"><?php echo $title; ?></a></h3>
                                <?php if($portfolio_sub_title !=''){ ?><span><a href="<?php the_permalink(); ?>"><?php echo $portfolio_sub_title; ?></a></span><?php } ?>
                            </div>
                        </div>
                    </div>
                </article>
                <?php } elseif ($count == 2){ ?>
                <article class="portfolio-item pf-graphics pf-uielements" style="position: absolute; left: 1014px; top: 0px; width: 338px;">
                    <div class="portfolio-image">
                        <a href="">
                            <img src="<?php echo bfiThumb_src($portfolio_image_src[0], 338, 254); ?>" alt="<?php echo $title; ?>" style="visibility: visible; opacity: 1; display: block;">
                        </a>
                        <div class="portfolio-overlay">
                            <div class="portfolio-desc" style="margin-top: 99px;">
                                <h3><a href="<?php the_permalink(); ?>"><?php echo $title; ?></a></h3>
                                <?php if($portfolio_sub_title !=''){ ?><span><a href="<?php the_permalink(); ?>"><?php echo $portfolio_sub_title; ?></a></span><?php } ?>
                            </div>
                        </div>
                    </div>
                </article>
                <?php } elseif ($count == 3){ ?>
                <article class="portfolio-item pf-media pf-icons wide" style="position: absolute; left: 676px; top: 253px; width: 676px;">
                    <div class="portfolio-image">
                        <a href="">
                            <img src="<?php echo bfiThumb_src($portfolio_image_src[0], 676, 254); ?>" alt="<?php echo $title; ?>" style="visibility: visible; opacity: 1; display: block;">
                        </a>
                        <div class="portfolio-overlay">
                            <div class="portfolio-desc" style="margin-top: 99px;">
                                <h3><a href="<?php the_permalink(); ?>"><?php echo $title; ?></a></h3>
                                <?php if($portfolio_sub_title !=''){ ?><span><a href="<?php the_permalink(); ?>"><?php echo $portfolio_sub_title; ?></a></span><?php } ?>
                            </div>
                        </div>
                    </div>
                </article>
                <?php } elseif ($count == 4){ ?>
                <article class="portfolio-item pf-uielements pf-media wide" style="position: absolute; left: 676px; top: 506px; width: 676px;">
                    <div class="portfolio-image">
                        <a href="">
                            <img src="<?php echo bfiThumb_src($portfolio_image_src[0], 676, 254); ?>" alt="<?php echo $title; ?>" style="visibility: visible; opacity: 1; display: block;">
                        </a>
                        <div class="portfolio-overlay">
                            <div class="portfolio-desc" style="margin-top: 99px;">
                                <h3><a href="<?php the_permalink(); ?>"><?php echo $title; ?></a></h3>
                                <?php if($portfolio_sub_title !=''){ ?><span><a href="<?php the_permalink(); ?>"><?php echo $portfolio_sub_title; ?></a></span><?php } ?>
                            </div>
                        </div>
                    </div>
                </article>
                <?php } elseif ($count == 5){ ?>
                <article class="portfolio-item pf-media pf-icons" style="position: absolute; left: 0px; top: 507px; width: 338px;">
                    <div class="portfolio-image">
                        <a href="">
                            <img src="<?php echo bfiThumb_src($portfolio_image_src[0], 338, 254); ?>" alt="<?php echo $title; ?>" style="visibility: visible; opacity: 1; display: block;">
                        </a>
                        <div class="portfolio-overlay">
                            <div class="portfolio-desc" style="margin-top: 99px;">
                                <h3><a href="<?php the_permalink(); ?>"><?php echo $title; ?></a></h3>
                                <?php if($portfolio_sub_title !=''){ ?><span><a href="<?php the_permalink(); ?>"><?php echo $portfolio_sub_title; ?></a></span><?php } ?>
                            </div>
                        </div>
                    </div>
                </article>
                <?php } elseif ($count == 6){ ?>
                <article class="portfolio-item pf-uielements pf-icons" style="position: absolute; left: 338px; top: 507px; width: 338px;">
                    <div class="portfolio-image">
                        <a href="">
                            <img src="<?php echo bfiThumb_src($portfolio_image_src[0], 338, 254); ?>" alt="<?php echo $title; ?>" style="visibility: visible; opacity: 1; display: block;">
                        </a>
                        <div class="portfolio-overlay">
                            <div class="portfolio-desc" style="margin-top: 99px;">
                                <h3><a href="<?php the_permalink(); ?>"><?php echo $title; ?></a></h3>
                                <?php if($portfolio_sub_title !=''){ ?><span><a href="<?php the_permalink(); ?>"><?php echo $portfolio_sub_title; ?></a></span><?php } ?>
                            </div>
                        </div>
                    </div>
                </article>
                <?php } else { ?>
                <article class="portfolio-item pf-uielements pf-media wide other" style="">
                    <div class="portfolio-image">
                        <a href="">
                            <img src="<?php echo bfiThumb_src($portfolio_image_src[0], 676, 254); ?>" alt="<?php echo $title; ?>" style="visibility: visible; opacity: 1; display: block;">
                        </a>
                        <div class="portfolio-overlay">
                            <div class="portfolio-desc" style="margin-top: 99px;">
                                <h3><a href="<?php the_permalink(); ?>"><?php echo $title; ?></a></h3>
                                <?php if($portfolio_sub_title !=''){ ?><span><a href="<?php the_permalink(); ?>"><?php echo $portfolio_sub_title; ?></a></span><?php } ?>
                            </div>
                        </div>
                    </div>
                </article>
                <?php } ?>
                <?php $count++;
                        }
                        sweetwords_numeric_posts_nav();
                    } else {
                        // no posts found
                    }
                    wp_reset_postdata();
                    ?>
                
                
                
                
                
                
            </div><!-- #portfolio end -->
<!--            <div class="topmargin center"><a href="" class="button button-border button-circle t600">View More Projects</a></div>-->
        </div>
    </div>
</section>
<?php get_footer(); ?>
<script type="text/javascript">
    
    jQuery().css()
    </script>