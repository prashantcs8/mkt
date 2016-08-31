<?php
/*
 * Template Name: Testimonial Page
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
<div id="section-about" class="center page-section">
    <?php
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $wp_query = new WP_Query('post_type=testimonial&posts_per_page=3&paged=' . $paged);
    if ($wp_query->have_posts()) {
        while ($wp_query->have_posts()) {
            $wp_query->the_post();
            $title = get_the_title();
            $testimonial_meta = get_post_meta($post->ID);
            $designation = $testimonial_meta['designation'][0];
            ?>
            <div class="container clearfix">
                <div class="testimonials-content">
                    <h2 class="divcenter bottommargin font-body" style=" font-size:35px;">
                        "<?php echo excerpt(55); ?>" </h2>
                    <div class="testi-meta">
                        <?php echo $title; ?>
                        <span><?php echo $designation; ?></span>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <?php
        }
        sweetwords_numeric_posts_nav();
    } else {
        // no posts found
    }
    wp_reset_postdata();
    ?>    
</div>
<?php get_footer(); ?>