<?php
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
        <div id="section-about" class="center page-section">
        <div class="container clearfix">
            <div class="row disclaimer privacy">
                <div class="span12">
                    <?php the_content(); ?> 
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php
get_footer();
?>
